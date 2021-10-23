<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Ideigradom");
?>

<? $APPLICATION->IncludeComponent(
    'ig:collections',
    '',
    array(
        'IBLOCK_ID' => '2',
        'IBLOCK_TYPE' => 'catalog',
        'SEF_FOLDER' => '/collections/',
        'SEF_MODE' => 'Y',
        'SEF_URL_TEMPLATES' => array(
            'element' => '#ELEMENT_CODE#/',
            'sections' => 'index.php',
            'smart_filter' => '#ELEMENT_CODE#/filter/#SMART_FILTER_PATH#/apply/'
        )
    )
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>