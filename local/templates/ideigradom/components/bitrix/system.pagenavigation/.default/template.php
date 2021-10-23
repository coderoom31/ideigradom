<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$url = $arResult['sUrlPath'] . '?' . $strNavQueryString . 'PAGEN_' . $arResult['NavNum'] . '=';

$countNextPage = $arResult['NavPageSize'];
if($arResult['NavPageNomer']+1 == $arResult['NavPageCount']){
    $countNextPage = $arResult['NavRecordCount'] - $arResult['NavPageSize']*$arResult['NavPageNomer'];
}

if($arResult['NavTitle'] === 'Товары'){
    $declension = new  Bitrix\Main\Grid\Declension('товар', 'товара', 'товаров');
    $countNextPagePrint = $countNextPage . '&nbsp;' . $declension->get($countNextPage);
}
?>

<? if($arResult["nEndPage"] != $arResult["nStartPage"]):?>
    <div class="pag__wrap">
        <?
        if ($arResult['NavPageNomer'] < $arResult['NavPageCount']) {
            ?>
            <button class="pag__btn-more btn btn--border" type="button"
                    data-url="<?= $url . ($arResult['NavPageNomer'] + 1); ?>"
            >
                Показать еще <?=$countNextPagePrint?>
            </button>
            <?
        }
        ?>
        <ul class="pag__list">
            <?
            if ($arResult['nStartPage'] > 1) {
                echo '<span>...</span>';
            }

            for ($pageNumber = $arResult['nStartPage']; $pageNumber <= $arResult['nEndPage']; $pageNumber++) {
                if ($pageNumber === 1) {
                    $paginationUrl = $arResult['sUrlPath'];
                } else {
                    $paginationUrl = $url . $pageNumber;
                }
                ?>
                <li class="pag__item">
                    <a href="<?= $paginationUrl; ?>"
                       class="pag__link btn
                        <?
                        if ($pageNumber == $arResult['NavPageNomer']) {
                            echo ' active';
                        }
                        ?>
                        "
                    ><?= $pageNumber; ?>
                    </a>
                </li>

                <?
            }

            if ($arResult['nEndPage'] < $arResult['NavPageCount']) {
                echo '<li><span>...</span></li>';
            }

            ?>
        </ul>
    </div>
<? endif?>