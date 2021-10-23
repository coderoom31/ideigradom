<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $templateData
 * @var string $templateFolder
 * @var CatalogSectionComponent $component
 */

global $APPLICATION;

$topSEOText = $arResult['UF_TOP_SEO_TEXT'];
$bottomSEOText = $arResult['UF_BOTTOM_SEO_TEXT'];
$sectionTitle = $arResult['NAME'];
$sectionCount = $arResult['SECTION_COUNT'];

$APPLICATION->AddViewContent('SECTION_COUNT', $sectionCount);
$APPLICATION->AddViewContent('SECTION_TITLE', $sectionTitle);
$APPLICATION->AddViewContent('SECTION_TOP_SEO_TEXT', $topSEOText);
$APPLICATION->AddViewContent('SECTION_BOTTOM_SEO_TEXT', $bottomSEOText);

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

// Обработка аякс запроса
if ($request->isAjaxRequest() && $request->get('action') === 'showMore') {
    $content = ob_get_contents();
    ob_end_clean();

    [, $itemsContainer] = explode('<!-- items-container -->', $content);
    [, $paginationContainer] = explode('<!-- pagination-container -->', $content);

    $component::sendJsonAnswer(
        [
            'items' => $itemsContainer,
            'pagination' => $paginationContainer
        ]
    );
}

if ($request->isAjaxRequest() && $request->get('action') === 'filterApply') {
    $content = ob_get_contents();
    ob_end_clean();

    [, $catalogContainer] = explode('<!-- catalog-container -->', $content);

    $component::sendJsonAnswer(
        [
            'catalog' => $catalogContainer,
        ]
    );
}