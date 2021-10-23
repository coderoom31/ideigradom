<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
Loader::includeModule("iblock");

require __DIR__ . '/constants.php';

// spl автозагрузчик классов
require __DIR__ . '/classes/autoload.php';


function setCollectionsCount()
{
    $dbCollections = CIBlockElement::GetList(
        [],
        ['IBLOCK_ID' => COLLECTIONS_IBLOCK_ID, 'ACTIVE' => 'Y'],
        false,
        false,
        ['IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_ICON', 'PREVIEW_PICTURE', 'IBLOCK_SECTION_ID']
    );

    while ($collection = $dbCollections->GetNext()) {

        $elementCount = CIBlockElement::GetList(
            [],
            ['IBLOCK_ID' => CATALOG_IBLOCK_ID, 'ACTIVE' => 'Y', 'PROPERTY_COLLECTIONS' => $collection['ID']],
            [],
            false,
            ['IBLOCK_ID', 'ID', 'NAME']
        );

        CIBlockElement::SetPropertyValuesEx($collection['ID'], false, array("COUNT_PROD" => $elementCount));
    }

    return "setCollectionsCount();";
}
