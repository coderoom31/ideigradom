<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div class="section__block prod-detail__wrap">
    <div class="prod-detail__bc bc bc--white">
        <a class="bc__link" href="<?= $arResult['SECTION']['SECTION_PAGE_URL'] ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#arrow-down"></use>
            </svg>
            <span><?= $arResult['SECTION']['NAME'] ?></span>
        </a>
    </div>

    <? if ($arResult['PROPERTIES']['HIT']['VALUE'] === 'Да') { ?>
        <div class="tag prod-detail__tag tag--orange">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#tag"></use>
            </svg>
            <span>Хит!</span>
        </div>
    <? } ?>

    <? if ($arResult['PROPERTIES']['NEW']['VALUE'] === 'Да') { ?>
        <div class="tag prod-detail__tag tag--green">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#tag"></use>
            </svg>
            <span>Новинка</span>
        </div>
    <? } ?>

    <div class="prod-detail__slider">
        <? if (is_array($arResult['PROPERTIES']['DETAIL_PHOTO']['VALUE'])) { ?>
            <div class="prod-detail__slider-pag">
                <? foreach ($arResult['PROPERTIES']['DETAIL_PHOTO']['VALUE'] as $key => $value) { ?>

                    <?
                    $activeClass = '';
                    if($key == 0){
                        $activeClass = 'active';
                    }
                    $picture = CFile::ResizeImageGet($value,
                        ['width' => 100, 'height' => 100]);
                    $picture2x = CFile::ResizeImageGet($value,
                        ['width' => 100 * 2, 'height' => 100 * 2]);
                    ?>
                    <button class="prod-detail__slider-pag-bullet <?=$activeClass?>" type="button" data-slide-btn="<?= $key ?>">
                        <img src="<?= $picture['src'] ?>" srcset="<?= $picture2x['src'] ?>"
                             alt="<?= $arResult['NAME'] ?>">
                    </button>
                <? } ?>
            </div>
            <div class="slider swiper-container js-prod-detail-slider">
                <div class="swiper-wrapper">
                    <? foreach ($arResult['PROPERTIES']['DETAIL_PHOTO']['VALUE'] as $key => $value) { ?>

                        <?
                        $picture = CFile::ResizeImageGet($value,
                            ['width' => 1439, 'height' => 985]);
                        $picture2x = CFile::ResizeImageGet($value,
                            ['width' => 1439 * 2, 'height' => 985 * 2]);
                        ?>
                        <div class="swiper-slide" data-src="<?= $picture['src'] ?>" data-slide="<?= $key ?>">
                            <img src="<?= $picture['src'] ?>" srcset="<?= $picture2x['src'] ?>"
                                 alt="<?= $arResult['NAME'] ?>"></div>
                    <? } ?>
                </div>
                <div class="slider__pag swiper-pagination"></div>
            </div>
        <? } else { ?>
            <img src="<?= SITE_TEMPLATE_PATH ?>/img/no-photos.png" alt="<?= $arResult['NAME'] ?>">
        <? } ?>
    </div>

    <div class="prod-detail__info">
        <div class="prod-detail__info-scroll">
            <div class="prod-detail__info-block">
                <div class="prod-detail__block">
                    <h2 class="prod-detail__title"><?= $arResult['NAME'] ?></h2>

                    <?
                    $arResult['DISCOUNT_PERCENT'] =
                        (($arResult['ITEM_PRICES'][0]['BASE_PRICE'] - $arResult['ITEM_PRICES'][0]['PRICE']) / $arResult['ITEM_PRICES'][0]['BASE_PRICE']) * 100;
                    ?>

                    <div class="prod-detail__cost cost cost--big">
                        <? if ($arResult['DISCOUNT_PERCENT'] > 0) { ?>
                            <p class="cost__discount"><?= $arResult['DISCOUNT_PERCENT'] ?>%</p>
                        <? } ?>
                        <p class="cost__val"><?= $arResult['ITEM_PRICES'][0]['PRICE'] ?> ₽</p>
                        <? if ($arResult['DISCOUNT_PERCENT'] > 0) { ?>
                            <p class="cost__old"><?= $arResult['ITEM_PRICES'][0]['BASE_PRICE'] ?> ₽</p>
                        <? } ?>
                    </div>
                </div>
                <?
                // TODO добавление в корзину
                ?>
                <div class="prod-detail__block grid">
                    <button class="prod-detail__btn-cart btn btn--red js-modal-open" type="button"
                            data-src="#modal-add-cart" data-id="<?= $arResult['ID'] ?>">В корзину
                    </button>
                    <button class="prod-detail__btn-fav btn js-btn" type="button"
                            aria-label="Добавить в избранное" data-tag="btn" data-product-id="<?= $arResult['ID'] ?>">
                        <svg width="24" height="22" viewBox="0 0 24 22" fill="#4E3D35">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#fav"></use>
                        </svg>
                    </button>
                </div>
                <? if ($arResult['DETAIL_TEXT']) { ?>
                    <div class="prod-detail__block">
                        <div class="prod-detail__descr">
                            <?= $arResult['DETAIL_TEXT'] ?>
                        </div>
                    </div>
                <? } ?>

                <div class="prod-detail__bottom js-fixed-block">
                    <div class="prod-detail__panel">
                        <h2 class="prod-detail__panel-title"><?= $arResult['NAME'] ?></h2>
                        <div class="prod-detail__panel-cost cost cost--small">

                            <p class="cost__val"><?= $arResult['ITEM_PRICES'][0]['PRICE'] ?> ₽</p>
                            <? if ($arResult['DISCOUNT_PERCENT'] > 0) { ?>
                                <p class="cost__old"><?= $arResult['ITEM_PRICES'][0]['BASE_PRICE'] ?>
                                    ₽</p>
                            <? } ?>

                        </div>
                        <button class="prod-detail__panel-btn btn btn--red" type="button">
                            В корзину
                        </button>
                    </div>
                </div>

                <? if ($arResult['PROPERTIES']['SIZE']['VALUE']) { ?>
                    <div class="prod-detail__block">
                        <h3 class="prod-detail__name">Размер</h3>
                        <p class="prod-detail__text"><?= $arResult['PROPERTIES']['SIZE']['VALUE'] ?></p>
                    </div>
                <? } ?>

                <? if ($arResult['PROPERTIES']['IN']['VALUE']) { ?>
                    <div class="prod-detail__block">
                        <h3 class="prod-detail__name">Внутри</h3>
                        <p class="prod-detail__text">
                            <?= $arResult['PROPERTIES']['IN']['VALUE'] ?>
                        </p>
                    </div>
                <? } ?>

                <? if (is_array($arResult['PROPERTIES']['FASTENERS']['VALUE'])) { ?>
                    <div class="prod-detail__block">
                        <h3 class="prod-detail__name">Застежки</h3>
                        <? foreach ($arResult['PROPERTIES']['FASTENERS']['VALUE'] as $value) { ?>
                            <p class="prod-detail__text"><?= $value ?></p>
                        <? } ?>
                    </div>
                <? } ?>

                <? if ($arResult['PROPERTIES']['MATERIAL']['VALUE']) { ?>
                    <div class="prod-detail__block">
                        <h3 class="prod-detail__name">Материал</h3>
                        <p class="prod-detail__text"><?= $arResult['PROPERTIES']['MATERIAL']['VALUE'] ?></p>
                    </div>
                <? } ?>

                <? if ($arResult['DISPLAY_PROPERTIES']['COLOR']['VALUE']) { ?>
                    <div class="prod-detail__block prod-detail__block--border">
                        <h3 class="prod-detail__name">Цвет</h3>
                        <div class="grid"><img class="prod-detail__color"
                                               src="<?= $arResult['DISPLAY_PROPERTIES']['COLOR']['FILE'] ?>"
                                               alt="<?= $arResult['DISPLAY_PROPERTIES']['COLOR']['DISPLAY_VALUE'] ?>">
                            <p class="prod-detail__text"><?= $arResult['DISPLAY_PROPERTIES']['COLOR']['DISPLAY_VALUE'] ?></p>
                        </div>
                    </div>
                <? } ?>

                <div class="prod-detail__block prod-detail__block--border">
                    <div class="grid">
                        <a class="prod-detail__link" href="/delivery/" aria-label="Доставка">
                            <svg width="41" height="41" viewBox="0 0 41 41" fill="none">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#delivery"></use>
                            </svg>
                            <span>Доставка</span>
                        </a>
                        <a class="prod-detail__link" href="/payment/" aria-label="Оплата">
                            <svg width="40" height="41" viewBox="0 0 40 41" fill="none">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#payment"></use>
                            </svg>
                            <span>Оплата</span>
                        </a>
                        <a class="prod-detail__link" href="/care/" aria-label="Уход">
                            <svg width="40" height="41" viewBox="0 0 40 41" fill="none">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#care"></use>
                            </svg>
                            <span>Уход</span>
                        </a>
                    </div>
                </div>

                <? if (count($arResult['DISPLAY_PROPERTIES']['COLLECTIONS']['ELEMENTS']) > 0) { ?>
                    <div class="prod-detail__block">
                        <h3 class="prod-detail__name">Присутствует в подборках</h3>
                        <ul class="prod-detail__links grid grid--menu">
                            <?
                            foreach ($arResult['DISPLAY_PROPERTIES']['COLLECTIONS']['ELEMENTS'] as
                                     $element) {
                                ?>
                                <li class="prod-detail__links-item grid__block">
                                    <a class="prod-detail__cat-link btn btn--gray"
                                       href="<?= $element["DETAIL_PAGE_URL"] ?>">
                                        <? if ($element['FILE']) { ?>
                                            <img src="<?= $element["FILE"] ?>"
                                                 alt="<?= $element["NAME"] ?>">
                                        <? } ?>
                                        <span><?= $element["NAME"] ?></span>
                                    </a>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</div>