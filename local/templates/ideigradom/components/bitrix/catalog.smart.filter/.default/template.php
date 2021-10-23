<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$clearFilterPath = preg_replace('/(filter.+)/', '', $APPLICATION->GetCurPage());
?>

<?
$countActiveFilter = 0;
foreach ($arResult['ITEMS'] as $item){
    foreach($item['VALUES'] as $value){
        if($value['CHECKED'] == 1){
            $countActiveFilter++;
        }
    }
}
?>

<div class="cat__toggle opened js-filter" data-toggle-container data-menu="filter">
    <div class="cat__filter">
        <?
        if($countActiveFilter > 0){
            $activeClass = 'active';
        }
        ?>
        <!-- active-класс у кнопки catalog__filter-btn - примененный фильтр-->
        <button class="cat__filter-btn btn btn--red dp <?=$activeClass?>" type="button" data-toggle-btn="filter"
                data-count="<?=$countActiveFilter?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#filter"></use>
            </svg>
            <span>Фильтр</span>
        </button>
        <button class="cat__filter-btn btn btn--red mob js-menu-open <?=$activeClass?>" type="button" data-menu="filter"
                data-count="<?=$countActiveFilter?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#filter"></use>
            </svg>
            <span>Фильтр</span>
        </button>
    </div>
    <div class="cat__sort select">

        <?
        $APPLICATION->ShowViewContent('SORTING');
        ?>

    </div>
    <div class="cat__display">
        <button class="cat__display-btn btn active" type="button" aria-label="По 1 товару в ряд" data-view-btn="row">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke-width="3">
                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#display-1"></use>
            </svg>
        </button>
        <button class="cat__display-btn btn" type="button" aria-label="По 2 товара в ряд" data-view-btn="column">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke-width="2">
                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#display-2"></use>
            </svg>
        </button>
    </div>

    <div class="cat__filter-menu filter" data-toggle="filter">
        <form id="form-filter">
            <div class="filter__head">
                <h3 class="filter__title">Фильтр</h3>
                <a class="filter__btn-reset link" href="<?= $clearFilterPath; ?>">Сбросить</a>
                <button class="filter__btn-close js-menu-close" type="button" aria-label="Закрыть фильтры">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#cross"></use>
                    </svg>
                </button>
            </div>

            <?
            foreach ($arResult['ITEMS'] as $item){
                switch ($item['CODE']) {
                    case 'COLOR':
                        include 'color.php';
                        break;
                    case 'ILLUSTRATIONS':
                        include 'illustrations.php';
                        break;
                    default:
                        break;
                }
            }
            ?>

            <div class="filter__submit" id="smartFilterResult">
                <button class="filter__btn-submit btn btn--red js-menu-close" type="button">Показать товары</button>
            </div>
        </form>
    </div>
</div>

<script>window.filter = new window.SmartFilter("<?= $APPLICATION->GetCurPage(); ?>");</script>