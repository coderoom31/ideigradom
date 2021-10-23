<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\Component\Tools;
use Bitrix\Main\Loader;

Loader::includeModule('iblock');

$variables = array();

/** @global CMain $APPLICATION */

$engine = new CComponentEngine($this);

$urlTemplates = CComponentEngine::makeComponentUrlTemplates(
    array(),
    $arParams["SEF_URL_TEMPLATES"]
);

$componentPage = $engine->guessComponentPath(
    $arParams["SEF_FOLDER"],
    $urlTemplates,
    $variables
);

if (!$componentPage) {
    Tools::process404(false, true, true, true);
}

$arResult = $variables;
$this->IncludeComponentTemplate($componentPage);