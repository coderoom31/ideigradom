<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Где купить");
?>

<? $APPLICATION->IncludeComponent(
    'ig:shops',
    '',
    [
        'IBLOCK_ID' => '4',
        'IBLOCK_TYPE' => 'info',
    ]
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>