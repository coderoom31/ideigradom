<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;

/**
 * @var array $arParams
 * @var array $templateData
 * @var string $templateFolder
 * @var CatalogSectionComponent $component
 */

global $APPLICATION;

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

// Обработка аякс запроса
if ($request->isAjaxRequest() && $request->get('action') === 'showMore') {
    $content = ob_get_contents();
    ob_end_clean();

    [, $itemsContainer] = explode('<!-- items-container -->', $content);
    [, $paginationContainer] = explode('<!-- pagination-container -->', $content);

    $result = [
        'items' => $itemsContainer,
        'pagination' => $paginationContainer
    ];

    $APPLICATION->RestartBuffer();
    echo Main\Web\Json::encode($result);

    \CMain::FinalActions();
    die();
}