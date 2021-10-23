<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use IG\GarbageStorage;

?>


    <section class="section section--top prod-detail">
        <div class="container">

            <?
            $elementId = $APPLICATION->IncludeComponent(
                "bitrix:catalog.element",
                "",
                [
                    "ACTION_VARIABLE" => "action",
                    "ADD_ELEMENT_CHAIN" => "Y",
                    "ADD_PROPERTIES_TO_BASKET" => "N",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "BACKGROUND_IMAGE" => "-",
                    "BASKET_URL" => "/personal/basket.php",
                    "BROWSER_TITLE" => "-",
                    "CACHE_GROUPS" => "N",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_SECTION_ID_VARIABLE" => "N",
                    "COMPATIBLE_MODE" => "N",
                    "CONVERT_CURRENCY" => "N",
                    "DETAIL_URL" => "",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                    "DISPLAY_COMPARE" => "N",
                    "ELEMENT_CODE" => $arResult['ELEMENT_CODE'],
                    "ELEMENT_ID" => "",
                    "GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
                    "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
                    "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
                    "GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
                    "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
                    "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
                    "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
                    "GIFTS_MESS_BTN_BUY" => "Выбрать",
                    "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
                    "GIFTS_SHOW_IMAGE" => "Y",
                    "GIFTS_SHOW_NAME" => "Y",
                    "GIFTS_SHOW_OLD_PRICE" => "Y",
                    "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                    'IBLOCK_TYPE' => 'catalog',
                    'IBLOCK_ID' => CATALOG_IBLOCK_ID,
                    "LINK_ELEMENTS_URL" => "",
                    "LINK_IBLOCK_ID" => "",
                    "LINK_IBLOCK_TYPE" => "",
                    "LINK_PROPERTY_SID" => "",
                    "MESSAGE_404" => "",
                    "META_DESCRIPTION" => "-",
                    "META_KEYWORDS" => "-",
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
                        'COLOR',
                    ],
                    "OFFERS_FIELD_CODE" => [],
                    "OFFERS_LIMIT" => "0",
                    "OFFERS_SORT_FIELD" => "sort",
                    "OFFERS_SORT_FIELD2" => "id",
                    "OFFERS_SORT_ORDER" => "asc",
                    "OFFERS_SORT_ORDER2" => "desc",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRICE_CODE" => ['PRICE'],
                    "PRICE_VAT_INCLUDE" => "Y",
                    "PRICE_VAT_SHOW_VALUE" => "N",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                    "SECTION_CODE" => $arResult['SECTION_CODE'],
                    "SECTION_ID" => "",
                    "SECTION_ID_VARIABLE" => "",
                    "SECTION_URL" => "",
                    "SEF_MODE" => "N",
                    "SET_BROWSER_TITLE" => "Y",
                    "SET_CANONICAL_URL" => "Y",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "Y",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_STATUS_404" => "Y",
                    "SET_TITLE" => "Y",
                    "SET_VIEWED_IN_COMPONENT" => "N",
                    "SHOW_404" => "N",
                    "SHOW_DEACTIVATED" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "SHOW_SKU_DESCRIPTION" => "N",
                    "STRICT_SECTION_CHECK" => "Y",
                    "USE_ELEMENT_COUNTER" => "Y",
                    "USE_GIFTS_DETAIL" => "N",
                    "USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
                    "USE_MAIN_ELEMENT_SECTION" => "Y",
                    "USE_PRICE_COUNT" => "N",
                    "USE_PRODUCT_QUANTITY" => "N"
                ]
            );
            ?>

            <div class="section__block comments">
                <h2 class="section__title prod-detail__subtitle">Отзывы</h2>
                <div class="comments__block">

                    <div id="mc-container"></div>
                    <script type="text/javascript">
                        cackle_widget = window.cackle_widget || [];
                        cackle_widget.push({widget: 'Comment', id: 77397});
                        (function() {
                            var mc = document.createElement('script');
                            mc.type = 'text/javascript';
                            mc.async = true;
                            mc.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cackle.me/widget.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
                        })();
                    </script>
                    <a id="mc-link" href="https://cackle.me">Комментарии для сайта <b style="color:#4FA3DA">Cackl</b><b style="color:#F65077">e</b></a>

                </div>
            </div>

            <?
            $setIDs = GarbageStorage::get('SET');
            $otherIllustrationsIDs = GarbageStorage::get('OTHER_ILLUSTRATIONS');
            $withBuyIDs = GarbageStorage::get('WITH_BUY');
            ?>

            <? if (is_array($setIDs) > 0) { ?>

                <?
                global $setIDsFilter;
                $setIDsFilter['ID'] = $setIDs;
                ?>

                <div class="section__block">
                    <h2 class="section__title prod-detail__subtitle">Добавить в комплект</h2>

                    <?
                    $APPLICATION->IncludeComponent(
                        'bitrix:catalog.section',
                        'slider',
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
                            'ELEMENT_SORT_FIELD' => 'sort',
                            'ELEMENT_SORT_FIELD2' => 'id',
                            'ELEMENT_SORT_ORDER' => 'asc',
                            'ELEMENT_SORT_ORDER2' => 'desc',
                            'FILE_404' => '',
                            'FILTER_NAME' => 'setIDsFilter',
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
                            'PAGE_ELEMENT_COUNT' => "10",
                            'PARTIAL_PRODUCT_PROPERTIES' => 'N',
                            'PRICE_CODE' => ['PRICE'],
                            'PRICE_VAT_INCLUDE' => 'Y',
                            'PRODUCT_ID_VARIABLE' => 'id',
                            'PRODUCT_PROPERTIES' => [],
                            'PRODUCT_PROPS_VARIABLE' => 'prop',
                            'PRODUCT_QUANTITY_VARIABLE' => 'quantity',
                            'PROPERTY_CODE' => [
                            ],
                            'SECTION_CODE' => '',
                            'SECTION_CODE_PATH' => '',
                            'SECTION_ID' => '',
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
            <? } ?>

            <? if (is_array($otherIllustrationsIDs) > 0) { ?>
                <?
                global $otherIllustrationsIDsFilter;
                $otherIllustrationsIDsFilter['ID'] = $otherIllustrationsIDs;
                ?>

                <div class="section__block">
                    <h2 class="section__title prod-detail__subtitle">С другой иллюстрацией</h2>

                    <?
                    $APPLICATION->IncludeComponent(
                        'bitrix:catalog.section',
                        'slider',
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
                            'ELEMENT_SORT_FIELD' => 'sort',
                            'ELEMENT_SORT_FIELD2' => 'id',
                            'ELEMENT_SORT_ORDER' => 'asc',
                            'ELEMENT_SORT_ORDER2' => 'desc',
                            'FILE_404' => '',
                            'FILTER_NAME' => 'otherIllustrationsIDsFilter',
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
                            'PAGE_ELEMENT_COUNT' => "10",
                            'PARTIAL_PRODUCT_PROPERTIES' => 'N',
                            'PRICE_CODE' => ['PRICE'],
                            'PRICE_VAT_INCLUDE' => 'Y',
                            'PRODUCT_ID_VARIABLE' => 'id',
                            'PRODUCT_PROPERTIES' => [],
                            'PRODUCT_PROPS_VARIABLE' => 'prop',
                            'PRODUCT_QUANTITY_VARIABLE' => 'quantity',
                            'PROPERTY_CODE' => [
                            ],
                            'SECTION_CODE' => '',
                            'SECTION_CODE_PATH' => '',
                            'SECTION_ID' => '',
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
            <? } ?>

            <? if (is_array($withBuyIDs) > 0) { ?>
                <?
                global $withBuyIDsFilter;
                $withBuyIDsFilter['ID'] = $withBuyIDs;
                ?>

                <div class="section__block">
                    <h2 class="section__title prod-detail__subtitle">С этим товаром покупают</h2>

                    <?
                    $APPLICATION->IncludeComponent(
                        'bitrix:catalog.section',
                        'slider',
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
                            'ELEMENT_SORT_FIELD' => 'sort',
                            'ELEMENT_SORT_FIELD2' => 'id',
                            'ELEMENT_SORT_ORDER' => 'asc',
                            'ELEMENT_SORT_ORDER2' => 'desc',
                            'FILE_404' => '',
                            'FILTER_NAME' => 'withBuyIDsFilter',
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
                            'PAGE_ELEMENT_COUNT' => "10",
                            'PARTIAL_PRODUCT_PROPERTIES' => 'N',
                            'PRICE_CODE' => ['PRICE'],
                            'PRICE_VAT_INCLUDE' => 'Y',
                            'PRODUCT_ID_VARIABLE' => 'id',
                            'PRODUCT_PROPERTIES' => [],
                            'PRODUCT_PROPS_VARIABLE' => 'prop',
                            'PRODUCT_QUANTITY_VARIABLE' => 'quantity',
                            'PROPERTY_CODE' => [
                            ],
                            'SECTION_CODE' => '',
                            'SECTION_CODE_PATH' => '',
                            'SECTION_ID' => '',
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
            <? } ?>

        </div>
    </section>

