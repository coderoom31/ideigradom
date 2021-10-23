<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if ($arResult) {
    $GLOBALS['arrFilter']['ID'] = $arResult;
    ?>
    <section class="section cat">
        <div class="container">
            <div class="cat__head">
                <h1 class="cat__title">Избранное <span><span class="favorite-count"></span> шт.</span></h1>
            </div>
            <div class="cat__body">
                <div class="cat__block">
                    <?
                    $APPLICATION->IncludeComponent(
                        'bitrix:catalog.section',
                        '',
                        [
                            'ACTION_VARIABLE' => 'action',
                            'ADD_PROPERTIES_TO_BASKET' => 'N',
                            'ADD_SECTIONS_CHAIN' => 'Y',
                            'AJAX_MODE' => 'N',
                            'AJAX_OPTION_ADDITIONAL' => '',
                            'AJAX_OPTION_HISTORY' => 'N',
                            'AJAX_OPTION_JUMP' => 'N',
                            'AJAX_OPTION_STYLE' => 'N',
                            'BACKGROUND_IMAGE' => '-',
                            'BASKET_URL' => '',
                            'BROWSER_TITLE' => '-',
                            'CACHE_FILTER' => 'Y',
                            'CACHE_GROUPS' => 'N',
                            'CACHE_TIME' => '36000000',
                            'CACHE_TYPE' => 'A',
                            'COMPATIBLE_MODE' => 'N',
                            'CONVERT_CURRENCY' => 'N',
                            'CUSTOM_FILTER' => '',
                            'DETAIL_URL' => '',
                            'DISABLE_INIT_JS_IN_COMPONENT' => 'N',
                            'DISPLAY_BOTTOM_PAGER' => 'Y',
                            'DISPLAY_COMPARE' => 'N',
                            'DISPLAY_TOP_PAGER' => 'N',
                            'ELEMENT_SORT_FIELD' => 'SORT',
                            'ELEMENT_SORT_FIELD2' => 'id',
                            'ELEMENT_SORT_ORDER' => 'ASC',
                            'ELEMENT_SORT_ORDER2' => 'desc',
                            'FILE_404' => '',
                            'FILTER_NAME' => 'arrFilter',
                            'HIDE_NOT_AVAILABLE' => 'N',
                            'HIDE_NOT_AVAILABLE_OFFERS' => 'N',
                            'IBLOCK_TYPE' => 'catalog',
                            'IBLOCK_ID' => CATALOG_IBLOCK_ID,
                            'INCLUDE_SUBSECTIONS' => 'Y',
                            'MESSAGE_404' => '',
                            'META_DESCRIPTION' => '-',
                            'META_KEYWORDS' => '-',
                            'OFFERS_LIMIT' => '0',
                            'PAGER_BASE_LINK_ENABLE' => 'N',
                            'PAGER_DESC_NUMBERING' => 'N',
                            'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000',
                            'PAGER_SHOW_ALL' => 'N',
                            'PAGER_SHOW_ALWAYS' => 'N',
                            'PAGER_TEMPLATE' => '.default',
                            'PAGER_TITLE' => 'Товары',
                            'PAGE_ELEMENT_COUNT' => "1000",
                            'PARTIAL_PRODUCT_PROPERTIES' => 'N',
                            'PRICE_CODE' => ['PRICE'],
                            'PRICE_VAT_INCLUDE' => 'Y',
                            'PRODUCT_ID_VARIABLE' => 'id',
                            'PRODUCT_PROPERTIES' => [],
                            'PRODUCT_PROPS_VARIABLE' => 'prop',
                            'PRODUCT_QUANTITY_VARIABLE' => 'quantity',
                            "FIELD_CODE" => [
                                0 => "ID",
                                1 => "CODE",
                                2 => "NAME",
                                3 => "TAGS",
                                4 => "PREVIEW_TEXT",
                                5 => "PREVIEW_PICTURE",
                                6 => "SHOW_COUNTER",
                                7 => "",
                            ],
                            'PROPERTY_CODE' => [
                            ],
                            'SECTION_CODE' => '',
                            'SECTION_CODE_PATH' => '',
                            'SECTION_ID_VARIABLE' => '',
                            'SECTION_URL' => '',
                            'SECTION_USER_FIELDS' => [],
                            'SEF_MODE' => 'Y',
                            'SEF_RULE' => '',
                            'SET_BROWSER_TITLE' => 'Y',
                            'SET_LAST_MODIFIED' => 'N',
                            'SET_META_DESCRIPTION' => 'Y',
                            'SET_META_KEYWORDS' => 'Y',
                            'SET_STATUS_404' => 'Y',
                            'SET_TITLE' => 'Y',
                            'SHOW_404' => 'N',
                            'SHOW_ALL_WO_SECTION' => 'Y',
                            'SHOW_PRICE_COUNT' => '1',
                            'USE_MAIN_ELEMENT_SECTION' => 'Y',
                            'USE_PRICE_COUNT' => 'N',
                            'USE_PRODUCT_QUANTITY' => 'N'
                        ]
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?
} else {
    ?>
    <section class="section cat cat--empty">
        <div class="cat__empty">
            <h2 class="cat__empty-title">Список избранного пуст</h2>
            <a class="btn btn--red" href="/c/">Перейти в каталог</a>
        </div>
    </section>
    <?
}