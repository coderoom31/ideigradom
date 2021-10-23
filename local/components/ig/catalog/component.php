<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\Component\Tools;
use Bitrix\Main\Loader;

Loader::includeModule('iblock');

$variables = array();

/** @global CMain $APPLICATION */

$engine = new CComponentEngine($this);
if (\Bitrix\Main\Loader::includeModule('iblock')) {
    $engine->addGreedyPart("#SMART_FILTER_PATH#");
    $engine->addGreedyPart("#SECTION_CODE_PATH#");
    $engine->setResolveCallback(array("CIBlockFindTools", "resolveComponentEngine"));
}

$urlTemplates = CComponentEngine::makeComponentUrlTemplates(
    array(),
    $arParams["SEF_URL_TEMPLATES"]
);

$componentPage = $engine->guessComponentPath(
    $arParams["SEF_FOLDER"],
    $urlTemplates,
    $variables
);

if ($componentPage === 'smart_filter') {
    $componentPage = 'section';
}

if (!$componentPage) {
    Tools::process404(false, true, true, true);
}

$arResult = $variables;
$this->IncludeComponentTemplate($componentPage);