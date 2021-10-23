<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Engine\ActionFilter\Csrf;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Loader;
use Bitrix\Main\Mail\Event;
use Bitrix\Sale\Basket;
use Bitrix\Sale\BasketItem;
use Bitrix\Sale\DiscountCouponsManager;
use Bitrix\Sale\PropertyValueBase;
use Bitrix\Sale\ShipmentCollection;
use Bitrix\Sale\ShipmentItem;
use Bitrix\Sale\ShipmentItemCollection;

class OrderAjaxController extends Controller
{
    /** @var int Частное лицо */
    const INDIVIDUAL = 1;

    public function configureActions(): array
    {
        return [
            'getDelivery' => [
                'prefilters' => [new Csrf()]
            ],
            'getPayment' => [
                'prefilters' => [new Csrf()]
            ],
            'newOrder' => [
                'prefilters' => [new Csrf()]
            ],
            'checkCoupon' => [
                'prefilters' => [new Csrf()]
            ],
            'deleteCoupon' => [
                'prefilters' => [new Csrf()]
            ],
        ];
    }

    public function getDeliveryAction(string $cityCode): array
    {
        Loader::includeModule('sale');
        Loader::includeModule('iblock');

        $order = Bitrix\Sale\Order::create(SITE_ID);
        $order->setPersonTypeId(self::INDIVIDUAL);

        $propertyCollection = $order->getPropertyCollection();
        /** @var PropertyValueBase $prop */
        foreach ($propertyCollection as $prop) {
            $propCode = $prop->getField('CODE');
            if ($propCode === 'CITY') {
                $prop->setValue($cityCode);
                break;
            }
        }

        $basket = Basket::loadItemsForFUser(
            CSaleBasket::GetBasketUserID(),
            SITE_ID
        );

        $order->setBasket($basket);

        /** @var ShipmentCollection $shipmentCollection */
        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem();
        $shipmentItemCollection = $shipment->getShipmentItemCollection();

        /** @var $shipmentItemCollection ShipmentItemCollection */
        foreach ($basket->getBasketItems() as $basketItem) {
            /**
             * @var $basketItem BasketItem
             * @var $shipmentItem ShipmentItem
             */
            $shipmentItem = $shipmentItemCollection->createItem($basketItem);
            $shipmentItem->setQuantity($basketItem->getQuantity());
        }

        /** @var \Bitrix\Sale\Delivery\Services\Base[] $delivery */
        $deliveryList = \Bitrix\Sale\Delivery\Services\Manager::getRestrictedObjectsList($shipment);

        $resultDelivery = [];
        foreach ($deliveryList as $delivery) {
            $shipment->setField('DELIVERY_ID', $delivery->getId());

            $resultDelivery[] = [
                'id' => $delivery->getId(),
                'name' => $delivery->getName(),
                'text' => $delivery->getDescription(),
                'additionalDescription' => $this->getAdditionalDeliveryDescription($delivery->getId())
            ];
        }

        return $resultDelivery;
    }

    private function getAdditionalDeliveryDescription(int $deliveryId)
    {
        $dbItem = CIBlockElement::GetList(
            [],
            ['=PROPERTY_DELIVERY_ID' => $deliveryId]
        );
        $item = $dbItem->fetch();

        return $item['DETAIL_TEXT'];
    }

    public function getPaymentAction(int $deliveryId): array
    {
        Loader::includeModule('sale');

        $order = Bitrix\Sale\Order::create(SITE_ID);
        $order->setPersonTypeId(self::INDIVIDUAL);

        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem();
        $shipment->setFields(['DELIVERY_ID' => $deliveryId]);

        $payment = $order->getPaymentCollection()->createItem();
        $paySystemList = Bitrix\Sale\PaySystem\Manager::getListWithRestrictions($payment);

        $paySystemsArray = [];
        foreach ($paySystemList as $paySystem) {
            $paySystemsArray[] = [
                'id' => $paySystem['ID'],
                'name' => $paySystem['NAME'],
                'text' => $paySystem['DESCRIPTION']
            ];
        }

        return $paySystemsArray;
    }

    public function newOrderAction(array $form)
    {

        $formData = array_combine(
            array_column($form, 'name'),
            array_column($form, 'value')
        );


        Loader::includeModule('sale');

        $userInfo = $this->getUserId($formData);

        if (!$userInfo['USER_ID']) {
            return [
                'ORDER_ID' => false,
                'MESSAGE' => $userInfo['ERROR']
            ];
        }

        $order = Bitrix\Sale\Order::create(SITE_ID, $userInfo['USER_ID']);
        $order->setPersonTypeId(self::INDIVIDUAL);

        $propertyCollection = $order->getPropertyCollection();
        /** @var PropertyValueBase $prop */
        foreach ($propertyCollection as $prop) {
            $propCode = $prop->getField('CODE');
            if (key_exists($propCode, $formData)) {
                $prop->setValue(htmlspecialchars($formData[$propCode]));
            }
        }

        $basket = Basket::loadItemsForFUser(
            CSaleBasket::GetBasketUserID(),
            SITE_ID
        );

        $order->setBasket($basket);

        /** @var ShipmentCollection $shipmentCollection */
        $shipmentCollection = $order->getShipmentCollection();

        $shipment = $shipmentCollection->createItem();
        $service = Bitrix\Sale\Delivery\Services\Manager::getById($formData['DELIVERY_ID']);
        $shipment->setFields(
            [
                'DELIVERY_ID' => $service['ID'],
                'DELIVERY_NAME' => $service['NAME'],
            ]
        );

        $shipmentItemCollection = $shipment->getShipmentItemCollection();

        /** @var $shipmentItemCollection ShipmentItemCollection */
        foreach ($basket->getBasketItems() as $basketItem) {
            /**
             * @var $basketItem BasketItem
             * @var $shipmentItem ShipmentItem
             */
            $shipmentItem = $shipmentItemCollection->createItem($basketItem);
            $shipmentItem->setQuantity($basketItem->getQuantity());
        }

        $paymentCollection = $order->getPaymentCollection();
        $payment = $paymentCollection->createItem(
            Bitrix\Sale\PaySystem\Manager::getObjectById($formData['PAYMENT_ID'])
        );
        $payment->setField('SUM', $order->getPrice());
        $payment->setField('CURRENCY', $order->getCurrency());

        if ($formData['USER_DESCRIPTION']) {
            $order->setField('USER_DESCRIPTION', $formData['USER_DESCRIPTION']);
        }

        $order->doFinalAction(true);
        $result = $order->save();

        if ($errorArray = $result->getErrorMessages()) {
            return  ['ORDER_ID' => false, 'MESSAGE' => implode($errorArray, '<br>')];
        } else {
            return ['ORDER_ID' => $order->getId()];
        }
    }

    private function getUserId(array $formData): array
    {
        global $USER;
        if ($USER->IsAuthorized()) {
            return ['USER_ID' => $USER->GetID()];
        } else {
            $dbUser = \Bitrix\Main\UserTable::getList(
                [
                    'filter' => ['LOGIN' => $formData['EMAIL']]
                ]
            );

            if ($dbUser->getSelectedRowsCount() > 0) {
                return [
                    'USER_ID' => false,
                    'ERROR' => 'Пользователь с такой почтой уже существует, для оформления заказа авторизуйтесь'
                ];
            }

            $password = randString(6);

            $user = new CUser();
            $userId = $user->Add(
                [
                    'NAME' => htmlspecialchars($formData['NAME']),
                    'PERSONAL_PHONE' => htmlspecialchars($formData['PHONE']),
                    'EMAIL' => htmlspecialchars($formData['EMAIL']),
                    'LOGIN' => htmlspecialchars($formData['EMAIL']),
                    'PASSWORD' => $password
                ]
            );

            $mailFields = array(
                'EVENT_NAME' => 'AUTO_REGISTRATION',
                'C_FIELDS' => [
                    'NAME' => htmlspecialchars($formData['NAME']),
                    'EMAIL' => $formData['EMAIL'],
                    'PASSWORD' => $password
                ],
                'LID' => SITE_ID,
            );

            Event::sendImmediate($mailFields);


            $USER->Authorize($userId);

            return ['USER_ID' => $userId];
        }
    }

    public function checkCouponAction(string $couponCode)
    {
        Loader::includeModule('sale');

        DiscountCouponsManager::init();
        if ($couponCode) {
            DiscountCouponsManager::clear(true);
            DiscountCouponsManager::add($couponCode);
        }
    }

    public function deleteCouponAction()
    {
        Loader::includeModule('sale');

        DiscountCouponsManager::init();
        DiscountCouponsManager::clear(true);
    }
}
