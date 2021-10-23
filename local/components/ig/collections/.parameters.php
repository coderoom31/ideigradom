<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/** @var array $arCurrentValues */

/** @global CUserTypeManager $USER_FIELD_MANAGER */

use Bitrix\Main\Loader,
    Bitrix\Iblock,
    Bitrix\Catalog;

if (!Loader::includeModule('iblock')) {
    return;
}

$catalogIncluded = Loader::includeModule('catalog');

$usePropertyFeatures = Iblock\Model\PropertyFeature::isEnabledFeatures();

$iblockExists = (!empty($arCurrentValues['IBLOCK_ID']) && (int)$arCurrentValues['IBLOCK_ID'] > 0);

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$offersIblock = [];
if ($catalogIncluded) {
    $iterator = Catalog\CatalogIblockTable::getList([
        'select' => ['IBLOCK_ID'],
        'filter' => ['!=PRODUCT_IBLOCK_ID' => 0]
    ]);
    while ($row = $iterator->fetch())
        $offersIblock[$row['IBLOCK_ID']] = true;
    unset($row, $iterator);
}

$arIBlock = [];
$iblockFilter = (
!empty($arCurrentValues['IBLOCK_TYPE'])
    ? ['TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y']
    : ['ACTIVE' => 'Y']
);
$rsIBlock = CIBlock::GetList(['SORT' => 'ASC'], $iblockFilter);
while ($arr = $rsIBlock->Fetch()) {
    $id = (int)$arr['ID'];
    if (isset($offersIblock[$id]))
        continue;
    $arIBlock[$id] = '[' . $id . '] ' . $arr['NAME'];
}

$arComponentParameters = [
    'PARAMETERS' => [
        'SEF_MODE' => [
            'sections' => [
                'NAME' => 'Список разделов',
                'DEFAULT' => 'index.php',
            ],
            'element' => [
                'NAME' => 'Детальная страница',
                'DEFAULT' => '#ELEMENT_CODE#/',
                'VARIABLES' => [
                    'ELEMENT_CODE',
                    'SECTION_CODE_PATH',
                ],
            ],
            'smart_filter' => array(
                'NAME' => 'Умный фильтр',
                'DEFAULT' => '#ELEMENT_CODE#/filter/#SMART_FILTER_PATH#/apply/',
                'VARIABLES' => array(
                    'SECTION_CODE',
                    'SECTION_CODE_PATH',
                    'SMART_FILTER_PATH',
                ),
            )

        ],
        'IBLOCK_TYPE' => [
            'PARENT' => 'BASE',
            'NAME' => 'Тип инфоблока',
            'TYPE' => 'LIST',
            'VALUES' => $arIBlockType,
            'REFRESH' => 'Y',
        ],
        'IBLOCK_ID' => [
            'PARENT' => 'BASE',
            'NAME' => 'ID инфоблока',
            'TYPE' => 'LIST',
            'ADDITIONAL_VALUES' => 'Y',
            'VALUES' => $arIBlock,
            'REFRESH' => 'Y',
        ]
    ]
];