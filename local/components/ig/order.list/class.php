<?
use Bitrix\Catalog\PriceTable;
use Bitrix\Main\Loader;


class OrderList extends CBitrixComponent
{
    private function getPrice(int $courseId)
    {
        $product = CIBlockElement::GetList(
            [],
            ['=PROPERTY_COURSE_VALUE' => $courseId],
            false,
            false,
            ['ID', 'IBLOCK_ID']
        )
            ->Fetch();

        $offers = current(\CCatalogSku::getOffersList($product['ID']));

        $prices = [];
        foreach ($offers as $offer) {
            $dbPrice = PriceTable::getList(
                [
                    'filter' => ['PRODUCT_ID' => $offer['ID']],
                    'select' => ['ID', 'CURRENCY', 'PRICE']
                ]
            );
            $price = $dbPrice->fetch();

            $discounts = CCatalogDiscount::GetDiscountByPrice(
                $price['ID'],
                $this->arParams['USER_GROUP']
            );

            $discountPrice = CCatalogProduct::CountPriceWithDiscount(
                $price['PRICE'],
                $price["CURRENCY"],
                $discounts
            );

            $prices[] = [
                'PRODUCT_ID' => $product['ID'],
                'BASE_PRICE' => floatval($price['PRICE']),
                'DISCOUNT_PRICE' => $discountPrice
            ];
        }

        usort($prices, function ($a, $b) {
            return $a['DISCOUNT_PRICE'] <=> $b['DISCOUNT_PRICE'];
        });

        return current($prices);
    }


    private function getOrders()
    {
        global $USER;
        $userId = $USER->GetID();
        $orders = [];

        // ### Объект заказа;

        $dbOrders = \Bitrix\Sale\OrderTable::getList(
            [
                'filter' => ['USER_ID' => $userId],
                'select' => ['ID', 'DATE_INSERT'],
                'order' => ['ID' => 'DESC']
            ]
        );

        while ($orderInfo = $dbOrders->fetch()) {

            // Болванка заказа
            $order = [
                'IS_ORDER' => true,
                'DATE_INSERT' => '',
                'ORDER_ID' => '',
                'PRICE' => '',
                'DELIVERY_PRICE' => '',
                'PAYMENT_STATUS' => '',
                'PICTURE' => '',
                'IS_GIFT' => '',
                'GIFT_CODE' => '',
                'IS_ACTIVATED' => '',
                'DELIVERY_ADDRESS' => '',
            ];


            $orderObj = \Bitrix\Sale\Order::load($orderInfo['ID']);

            $order['DATE_INSERT'] = $orderInfo['DATE_INSERT']->toString();
            $order['ORDER_ID'] = $orderObj->getId();
            $order['NUMBER_ORDER'] = $orderObj->getField('ACCOUNT_NUMBER');
            $order['PRICE'] = $orderObj->getPrice();
            $order['DELIVERY_PRICE'] = $orderObj->getDeliveryPrice();
            $order['PAYMENT_STATUS'] = $orderObj->isPaid();

            // ### Свойства заказа

            foreach ($orderObj->getPropertyCollection()->getArray()['properties'] as $prop) {
                $order[$prop['CODE']] = current($prop['VALUE']);
            }

            /** @var \Bitrix\Sale\BasketItem $basketItem */
            $basketItem = current($orderObj->getBasket()->getBasketItems());
//            $order['OFFER_NAME'] = $basketItem->getField('NAME');
//
//            $offerId = $basketItem->getProductId();
//            $productInfo = \CCatalogSku::GetProductInfo($offerId);
//            $order['PRODUCT_ID'] = $productInfo['ID'];
//
//            $product = CIBlockElement::GetList(
//                [],
//                ['ID' => $productInfo['ID']],
//                false,
//                false,
//                ['ID', 'NAME', 'PROPERTY_LK_PIC', 'PROPERTY_COURSE']
//            )
//                ->Fetch();
//
//            $order['PRODUCT_NAME'] = $product['NAME'];
//            $order['PICTURE'] = $product['PROPERTY_LK_PIC_VALUE'];


            $orders[$order['ORDER_ID']] = $order;
        }

        return $orders;
    }

    public function executeComponent()
    {
        global $USER;
        $userId = $USER->GetID();

        Loader::includeModule('iblock');
        Loader::includeModule('sale');
        Loader::includeModule('highloadblock');

        // ### Получаем заказы пользователя

        $orders = $this->getOrders();

        $this->arResult = $result;

        $this->includeComponentTemplate();
    }
}