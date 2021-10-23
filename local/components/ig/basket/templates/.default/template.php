<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<?
$basketCount = count($arResult);
if($basketCount === 0){
    $cartClass = 'cart--empty';
}
?>

<section class="section cart <?=$cartClass?>">
        <div class="container cart__container">
            <h1 class="cart__title">Оформление заказа</h1>
            <div class="cart__wrap">
                <div class="cart__left">
                    <div class="cart__order">
                        <div class="cart__items">

                            <? foreach ($arResult as $item) { ?>

                                <div class="cart-item js-cart-item">
                                    <!-- 1x: width: 193px; height: 269px;-->
                                    <!-- 2x: width: 386px; height: 538px;-->
                                    <div class="cart-item__img">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/catalog/catalog-1@1x.png"
                                             srcset="<?= SITE_TEMPLATE_PATH ?>/img/catalog/catalog-1@2x.png 2x"
                                             alt="<?= $item['NAME'] ?>"/>
                                    </div>
                                    <div class="cart-item__info">
                                        <div class="cart-item__top">
                                            <a class="cart-item__title" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                                <?= $item['NAME'] ?>
                                            </a>
                                            <p class="cart-item__descr">Натуральная кожа</p>
                                            <p class="cart-item__descr">19,5 см × 9 см</p>
                                        </div>
                                        <div class="cart-item__bottom">
                                            <div class="cart-item__multiplier multiplier" data-tag="multiplier">
                                                <button class="js-handler btn cart-action-minus" type="button"
                                                        data-minus="data-minus"
                                                        data-basket-id="<?= $item['BASKET_ITEM_ID'] ?>"
                                                        data-min="1" aria-label="Минус">
                                                    <svg width="12" height="2" viewBox="0 0 12 2" fill="none">
                                                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#minus"></use>
                                                    </svg>
                                                </button>
                                                <input class="js-handler-input" type="text"
                                                       value="<?= $item['QUANTITY_IN_BASKET'] ?>"/>
                                                <button class="js-handler btn cart-action-plus" type="button"
                                                        data-plus="data-plus"
                                                        data-basket-id="<?= $item['BASKET_ITEM_ID'] ?>"
                                                        data-max="100" aria-label="Плюс">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#plus"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="cart-item__cost cost cost--cart">
                                                <p class="cost__val" data-cost="<?= $item['PRICE']['PRICE'] ?>"
                                                   data-new-cost="<?= $item['PRICE']['PRICE'] * $item['QUANTITY_IN_BASKET'] ?>"><?= $item['PRICE']['PRICE'] ?>
                                                    ₽</p>
                                                <p class="cost__amount"
                                                   data-amount="data-amount"><?= $item['QUANTITY_IN_BASKET'] ?> шт.
                                                    × <?= $item['PRICE']['PRICE'] ?>₽</p>
                                            </div>
                                            <button class="cart-item__btn-delete btn" type="button" aria-label="Удалить"
                                                    data-delete="data-delete"
                                                    data-basket-id="<?= $item['BASKET_ITEM_ID'] ?>"
                                            >
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#cross"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            <? } ?>

                        </div>

