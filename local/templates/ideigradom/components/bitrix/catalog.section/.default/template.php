<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div id="jsCatalogList">
    <!-- catalog-container -->

    <div class="cat__grid grid grid--cat js-cat-grid">
        <!-- items-container -->
        <? foreach ($arResult['ITEMS'] as $element) { ?>

            <div class="prod-card grid__block">
                <a class="prod-card__link" href="<?= $element['DETAIL_PAGE_URL'] ?>">
                    <button class="prod-card__fav btn js-btn" type="button" aria-label="Добавить в избранное"
                            data-tag="btn" data-product-id="<?=$element['ID']?>">
                        <img class="not-active" src="<?= SITE_TEMPLATE_PATH ?>/img/icons/fav-white.svg"
                             alt="Избранное"/>
                        <img class="active" src="<?= SITE_TEMPLATE_PATH ?>/img/icons/fav-active.svg" alt="Избранное"/>
                    </button>
                    <div class="prod-card__img">

                        <? if ($element['PREVIEW_PICTURE']["ID"] > 0) { ?>
                            <?
                            $picture = CFile::ResizeImageGet($element['PREVIEW_PICTURE']['ID'], ['width' => 1000, 'height' => 697]);
                            $picture2x = CFile::ResizeImageGet($element['PREVIEW_PICTURE']['ID'], ['width' => 1000 * 2, 'height' => 697 * 2]);
                            ?>

                            <img src="<?= $picture['src'] ?>" srcset="<?= $picture2x['src'] ?>"
                                 alt="<?= $element['NAME'] ?>"/>

                        <? } else { ?>
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/no-photos.png" alt="<?= $element['NAME'] ?>">
                        <? } ?>


                    </div>

                    <?
                    $element['DISCOUNT_PERCENT'] =
                        (($element['ITEM_PRICES'][0]['BASE_PRICE'] - $element['ITEM_PRICES'][0]['PRICE']) / $element['ITEM_PRICES'][0]['BASE_PRICE']) * 100;
                    ?>

                    <div class="prod-card__info">
                        <div class="prod-card__info-left">
                            <div class="prod-card__cost cost">
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
                                    data-product-id="<?=$element['ID']?>">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#plus-big"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </a>
            </div>

        <? } ?>
        <!-- items-container -->
    </div>

    <div class="pag">
        <!-- pagination-container -->
        <?= $arResult['NAV_STRING']; ?>
        <!-- pagination-container -->
    </div>

    <!-- catalog-container -->
</div>

<?
if (!empty($arResult['NAV_RESULT'])) {
    $navParams = array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}
?>

<? if (is_array($arResult['LINKED_SECTION'])) { ?>
    <?
    $this->SetViewTarget('SECTION_ADD');
    ?>
    <p class="cat__add-text">А еще у нас есть</p>
    <h2 class="cat__add-title"><?= $arResult['LINKED_SECTION']['NAME'] ?></h2>
    <a class="cat__add-link btn btn--red" href="<?= $arResult['LINKED_SECTION']['SECTION_PAGE_URL'] ?>">Смотреть</a>
    <div class="cat__add-imgs">
        <?
        $sectionPicture = CFile::ResizeImageGet($arResult['LINKED_SECTION']['IMAGE'], ['width' => 2147, 'height' => 844]);
        $sectionPicture2x = CFile::ResizeImageGet($arResult['LINKED_SECTION']['IMAGE'], ['width' => 2147 * 2, 'height' => 844 *
            2]);
        ?>
        <img src="<?= $sectionPicture['src'] ?>"
             srcset="<?= $sectionPicture2x['src'] ?>" width="2147" height="844"
             alt="<?= $arResult['LINKED_SECTION']['NAME'] ?>">
    </div>
    <?php
    $this->EndViewTarget();
    ?>
<? } ?>
