<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<?
$APPLICATION->IncludeComponent(
    'ig:blog.element',
    '',
    Array(
        'CODE' => $arResult['ELEMENT_CODE'],
        'IBLOCK_ID' => $arParams['IBLOCK_ID']
    )
);
?>