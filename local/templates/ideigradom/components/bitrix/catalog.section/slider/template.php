<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

?>

<div class="prod-slider slider swiper-container js-products-slider">
    <div class="swiper-wrapper">

        <? foreach ($arResult['ITEMS'] as $element) { ?>
            <div class="prod-card swiper-slide">

                <a class="prod-card__link" href="<?= $element['DETAIL_PAGE_URL'] ?>">

                    <button class="prod-card__fav btn js-btn" type="button"
                            aria-label="Добавить в избранное" data-tag="btn" data-product-id="<?=$element['ID']?>">
                        <img class="not-active" src="<?= SITE_TEMPLATE_PATH ?>/img/icons/fav-white.svg" alt="Избранное"/>
                        <img class="active" src="<?= SITE_TEMPLATE_PATH ?>/img/icons/fav-active.svg" alt="Избранное"/>
                    </button>

                    <div class="prod-card__img">

                        <? if ($element["PREVIEW_PICTURE"] > 0) { ?>
                            <?
                            $picture = CFile::ResizeImageGet($element['PREVIEW_PICTURE'], ['width' => 1000, 'height' => 697]);
                            $picture2x = CFile::ResizeImageGet($element['PREVIEW_PICTURE'], ['width' => 1000 * 2, 'height' => 697 * 2]);
                            ?>

                            <img src="<?= $picture['src'] ?>" srcset="<?= $picture2x['src'] ?>"
                                 alt="<?= $element['NAME'] ?>"/>

                        <? } else { ?>
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/no-photos.png" alt="<?= $element['NAME'] ?>">
                        <? } ?>

                    </div>

                    <div class="prod-card__info">
                        <div class="prod-card__info-left">

                            <div class="prod-card__cost cost">
                                <?
                                $element['DISCOUNT_PERCENT'] =
                                    (($element['ITEM_PRICES'][0]['BASE_PRICE'] - $element['ITEM_PRICES'][0]['PRICE']) / $element['ITEM_PRICES'][0]['BASE_PRICE']) * 100;
                                ?>

                                <? if ($element['DISCOUNT_PERCENT'] > 0) { ?>
                                    <p class="cost__discount"><?= $element['DISCOUNT_PERCENT'] ?>%</p>
                                <? } ?>
                                <p class="cost__val"><?= $element['ITEM_PRICES'][0]['PRICE'] ?> ₽</p>
                                <? if ($element['DISCOUNT_PERCENT'] > 0) { ?>
                                    <p class="cost__old"><?= $element['ITEM_PRICES'][0]['BASE_PRICE'] ?> ₽</p>
                                <? } ?>
                            </div>

                            <h3 class="prod-card__title"><?= $element['NAME'] ?></h3>
                        </div>
                        <div class="prod-card__info-right">
                            <button class="prod-card__cart btn btn--red js-modal-open" type="button"
                                    data-src="#modal-add-cart" aria-label="Добавить в корзину"
                                    data-product-id="<?=$element['ID']?>"
                            >
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#plus-big"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </a>

            </div>
        <? } ?>
    </div>
    <div class="slider__pag swiper-pagination"></div>
</div>
