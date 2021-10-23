<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<button class="cat__sort-btn select__btn" type="button">

    <?
    if($arResult['SORT'] === 'SORT'){
    ?>

        <span>По умолчанию</span>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-down"></use>
        </svg>

    <?} elseif($arResult['SORT'] === 'SHOW_COUNTER') {?>

        <span>По популярности</span>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-down"></use>
        </svg>

    <?} elseif ($arResult['SORT'] === 'CATALOG_PRICE_1') {?>

        <span>По цене</span>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-down"></use>
        </svg>

    <?}?>

</button>

<ul class="select__list">

    <?
    if($arResult['SORT'] === 'SORT'){
        ?>

        <li class="select__item">
            <a class="select__link" data-sort="CATALOG_PRICE_1" data-order="ASC" href="#">По цене</a>
        </li>
        <li class="select__item">
            <a class="select__link" data-sort="SHOW_COUNTER" data-order="DESC" href="#">По популярности</a>
        </li>

    <?} elseif($arResult['SORT'] === 'SHOW_COUNTER') {?>

        <li class="select__item">
            <a class="select__link" data-sort="SORT" data-order="ASC" href="#">По умолчанию</a>
        </li>
        <li class="select__item">
            <a class="select__link" data-sort="CATALOG_PRICE_1" data-order="ASC" href="#">По цене</a>
        </li>

    <?} elseif ($arResult['SORT'] === 'CATALOG_PRICE_1') {?>

        <li class="select__item">
            <a class="select__link" data-sort="SORT" data-order="ASC" href="#">По умолчанию</a>
        </li>
        <li class="select__item">
            <a class="select__link" data-sort="SHOW_COUNTER" data-order="DESC" href="#">По популярности</a>
        </li>

    <?}?>


</ul>

<form id="products-sort" method="post" style="display: none;">
    <input type="hidden" name="SORT">
    <input type="hidden" name="ORDER">
</form>