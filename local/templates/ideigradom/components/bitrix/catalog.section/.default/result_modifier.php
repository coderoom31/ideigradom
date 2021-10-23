<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$arResult['SECTION_COUNT'] = $arResult['NAV_RESULT']->NavRecordCount;

/**
 * Получаем дополнительные данные о разделе
 */
$section = [];
$dbSection = CIBlockSection::GetList(
    [],
    [
        'IBLOCK_ID' => CATALOG_IBLOCK_ID, 'ID' => $arResult['ID'],'ACTIVE' => 'Y'
    ],
    false,
    ['ID', 'UF_*']
);
if ($section = $dbSection->GetNext()) {
    $arResult['UF_TOP_SEO_TEXT'] = $section['UF_TOP_SEO_TEXT'];
    $arResult['UF_BOTTOM_SEO_TEXT'] = $section['UF_BOTTOM_SEO_TEXT'];
    $arResult['UF_LINKED_SECTION'] = $section['UF_LINKED_SECTION'];
    $arResult['UF_LINKED_SECTION_IMAGE'] = $section['UF_LINKED_SECTION_IMAGE'];

    if($arResult['UF_LINKED_SECTION'] > 1){
        $linkedSection = [];
        $dbLinkedSection = CIBlockSection::GetList(
            [],
            [
                'IBLOCK_ID' => CATALOG_IBLOCK_ID, 'ID' => $arResult["UF_LINKED_SECTION"],'ACTIVE' => 'Y'
            ],
            false,
            ['ID', 'NAME', 'IBLOCK_ID', 'SECTION_PAGE_URL']
        );

        if ($linkedSection = $dbLinkedSection->GetNext()) {
            $arResult['LINKED_SECTION']['NAME'] = $linkedSection['NAME'];
            $arResult['LINKED_SECTION']['SECTION_PAGE_URL'] = $linkedSection['SECTION_PAGE_URL'];
            $arResult['LINKED_SECTION']['IMAGE'] = $arResult['UF_LINKED_SECTION_IMAGE'];
        }
    }
}

$component->setResultCacheKeys(['SECTION_COUNT']);
$component->setResultCacheKeys(['UF_TOP_SEO_TEXT']);
$component->setResultCacheKeys(['UF_BOTTOM_SEO_TEXT']);
$component->setResultCacheKeys(['LINKED_SECTION']);