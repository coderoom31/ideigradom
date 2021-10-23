<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>

<?
$APPLICATION->IncludeComponent('ig:basket', '');
?>

<?
$APPLICATION->IncludeComponent('ig:order', '');
?>




<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>