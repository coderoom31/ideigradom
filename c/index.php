<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Ideigradom");
?>

<? $APPLICATION->IncludeComponent(
    'ig:catalog',
    '',
    [
        'IBLOCK_ID' => '1',
        'IBLOCK_TYPE' => 'catalog',
        'SEF_FOLDER' => '/c/',
        'SEF_MODE' => 'Y',
        'SEF_URL_TEMPLATES' => array(
            'section' => '#SECTION_CODE_PATH#/',
            'element' => '#SECTION_CODE_PATH#/#ELEMENT_CODE#/',
            'sections' => 'index.php',
            'smart_filter' => '#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/'
        )
    ]
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>