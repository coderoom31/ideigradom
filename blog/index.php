<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Блог");
?>

<? $APPLICATION->IncludeComponent(
    'ig:blog',
    '',
    [
        'IBLOCK_ID' => '3',
        'IBLOCK_TYPE' => 'info',
        'SEF_FOLDER' => '/blog/',
        'SEF_MODE' => 'Y',
        'SEF_URL_TEMPLATES' => array(
            'element' => '#ELEMENT_CODE#/',
            'sections' => 'index.php',
        )
    ]
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>