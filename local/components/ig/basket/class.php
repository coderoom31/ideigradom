<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Sale\Basket;
use Bitrix\Sale\Discount;
use Bitrix\Sale;

class BasketOrder extends CBitrixComponent
{
    private function getProductsInBasket(): array
    {
        $products = [];

        /** @var Basket $basket */
        $basket = Basket::loadItemsForFUser(
            Sale\Fuser::getId(),
            SITE_ID
        );

        if ($basket->isEmpty()) {
            return [];
        }

        $productsPrices = $this->applyDiscount($basket);

        /** @var Bitrix\Sale\BasketItem $item */
        foreach ($basket->getBasketItems() as $item) {
            $product = $this->getProduct($item->getProductId());
            $product['BASKET_ITEM_ID'] = $item->getId();
            $product['PRICE'] = $productsPrices[$item->getId()];
            $product['QUANTITY_IN_BASKET'] = $item->getQuantity();

            $products[] = $product;
        }

        return $products;
    }

    private function applyDiscount(Basket $basket): array
    {
        $context = new Discount\Context\Fuser($basket->getFUserId());
        $discounts = Discount::buildFromBasket($basket, $context);
        $discounts->calculate();
        $result = $discounts->getApplyResult(true);

        return $result['PRICES']['BASKET'];
    }

    private function getProduct(int $id): array
    {
        $product = CIBlockElement::GetByID($id)->GetNext();
        $product['PREVIEW_PICTURE'] = $this->getPicture($product);

        return $product;
    }

    private function getPicture(array $product): ?string
    {
        if ($product['PREVIEW_PICTURE']) {
            return $product['PREVIEW_PICTURE'];
        } elseif ($product['DETAIL_PICTURE']) {
            return $product['DETAIL_PICTURE'];
        } else {
            return null;
        }
    }

    public function executeComponent()
    {
        Loader::includeModule('sale');

        $this->arResult = $this->getProductsInBasket();

        $this->includeComponentTemplate();
    }
}