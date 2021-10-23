<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Loader;


$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


/** Получение картинки для свойства цвет */
if ($arResult['PROPERTIES']['COLOR']['VALUE']) {
    Loader::IncludeModule('highloadblock');

    $arHLBlock = HL\HighloadBlockTable::getById(HL_COLOR_ID)->fetch();
    $obEntity = HL\HighloadBlockTable::compileEntity($arHLBlock);
    $strEntityDataClass = $obEntity->getDataClass();
    $resData = $strEntityDataClass::getList(array(
        'select' => array('UF_FILE'),
        'filter' => array('UF_XML_ID' => $arResult['PROPERTIES']['COLOR']['VALUE']),
        'order' => array('ID' => 'ASC'),
        'limit' => 1
    ));

    $fileID = [];
    while ($arItem = $resData->Fetch()) {
        $fileID = $arItem['UF_FILE'];
    }

    $arResult['DISPLAY_PROPERTIES']['COLOR']['FILE'] = CFile::getPath($fileID);
}

/** Получение иконки, ссылки и названия для свойства коллекции */
if (is_array($arResult['PROPERTIES']['COLLECTIONS']['VALUE'])) {
    Loader::IncludeModule('iblock');

    $dbElements = CIBlockElement::GetList(
        [],
        ['IBLOCK_ID' => COLLECTIONS_IBLOCK_ID, 'ACTIVE' => 'Y', 'ID' => $arResult['PROPERTIES']['COLLECTIONS']['VALUE']],
        false,
        false,
        ['IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_ICON_DETAIL']
    );

    while ($element = $dbElements->GetNext()) {
        $arResult['DISPLAY_PROPERTIES']['COLLECTIONS']['ELEMENTS'][$element['ID']]['NAME'] = $element['NAME'];
        $arResult['DISPLAY_PROPERTIES']['COLLECTIONS']['ELEMENTS'][$element['ID']]['FILE'] = CFile::getPath($element['PROPERTY_ICON_DETAIL_VALUE']);
        $arResult['DISPLAY_PROPERTIES']['COLLECTIONS']['ELEMENTS'][$element['ID']]['DETAIL_PAGE_URL'] = $element['DETAIL_PAGE_URL'];
    }
}

$component->setResultCacheKeys(['PROPERTIES']['SET']['VALUE']);
$component->setResultCacheKeys(['PROPERTIES']['OTHER_ILLUSTRATIONS']['VALUE']);
$component->setResultCacheKeys(['PROPERTIES']['WITH_BUY']['VALUE']);