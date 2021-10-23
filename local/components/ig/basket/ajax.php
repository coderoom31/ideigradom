<?

use Bitrix\Main\{
    Context,
    Engine\Controller,
    Loader
};
use Bitrix\Currency\CurrencyManager;
use Bitrix\Sale\Basket;
use Bitrix\Sale\Discount;
use Bitrix\Sale\Fuser;

class BasketAjaxController extends Controller
{
    public function configureActions(): array
    {
        return [
            'changeQuantity' => [
                'prefilters' => []
            ],
            'add' => [
                'prefilters' => []
            ],
            'remove' => [
                'prefilters' => []
            ]
        ];
    }

    /**
     * @param int $basketItemId
     * @param int $quantity
     */
    public function changeQuantityAction(int $basketItemId, float $quantity)
    {
        Loader::includeModule('sale');

        $basket = Basket::loadItemsForFUser(
            Fuser::getId(),
            Context::getCurrent()->getSite()
        );

        $item = $basket->getItemById($basketItemId);
        $item->setFields(['QUANTITY' => $quantity]);

        $basket->save();
    }

    /**
     * @param int $productId
     * @param int $quantity
     */
    public function addAction(int $productId, int $quantity)
    {
        $basketCount = 0;
        Loader::includeModule('sale');

        Bitrix\Catalog\Product\Basket::addProduct(
            [
                'PRODUCT_ID' => $productId,
                'QUANTITY' => $quantity
            ]
        );

        $basket = Bitrix\Sale\Basket::loadItemsForFUser(Fuser::getId(), SITE_ID);
        $basketCount = $basket->count();

        return [
            'COUNT' => $basketCount
        ];
    }

    /**
     * @param int $basketItemId
     * @return int
     */
    public function removeAction(int $basketItemId)
    {
        Loader::includeModule('sale');

        $basket = Basket::loadItemsForFUser(
            Fuser::getId(),
            Context::getCurrent()->getSite()
        );

        $item = $basket->getItemById($basketItemId);
        $item->delete();

        $basket->save();

        return $basketItemId;
    }

    /**
     * Получает общую цену товара в корзине
     * @return array
     */
    public function getPriceInBasketAction()
    {
        Loader::includeModule('sale');

        $basketPrice = 0;

        $basket = Basket::loadItemsForFUser(
            Fuser::getId(),
            Context::getCurrent()->getSite()
        );

        if (!$basket->isEmpty()) {
            $context = new Discount\Context\Fuser($basket->getFUserId());
            $discounts = Discount::buildFromBasket($basket, $context);
            $discounts->calculate();
            $result = $discounts->getApplyResult(true);

            foreach ($result['PRICES']['BASKET'] as $basketItemId => $basketItemPrice) {
                $basketPrice += $basketItemPrice['PRICE'] * $basket->getItemById($basketItemId)->getQuantity();
            }
        }

        return [
            'PRICE' => $basketPrice,
            'QUANTITY' => $basket->count()
        ];
    }
}