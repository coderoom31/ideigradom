<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

$assetsPath = '/local/templates/ideigradom';
$assets = Asset::getInstance();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">

    <title><? $APPLICATION->ShowTitle(); ?></title>

    <meta name="Description" content="Put your description here.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <?
    $assets->addCss($assetsPath.'/css/style.css');

    $assets->addJs($assetsPath . '/js/jquery.min.js');
    $assets->addJs($assetsPath . '/js/vendor.min.js');
    $assets->addJs($assetsPath . '/js/script.min.js');
    $assets->addJs($assetsPath . '/js/custom.js');

    $APPLICATION->ShowHead();

    include 'fonts.php';

    ?>

    <script data-skip-moving="true">window.ideigradom = {};</script>
</head>

<body>
<? $APPLICATION->ShowPanel(); ?>
<body>
<div class="page">
    <header class="header header--cart js-header">
        <div class="container">
            <div class="header__wrap">
                <div class="header__left">
                    <a class="header__link-back" href="javascript:history.back()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <use xlink:href="<?=$assetsPath?>/img/sprite.svg#arrow-down"></use>
                        </svg>
                        <span>
                            Вернуться к покупкам
                        </span>
                    </a>
                </div>
                <a class="header__logo logo" href="/" aria-label="Переход на главную">
                    <svg width="277" height="69" viewBox="0 0 277 69" fill="none">
                        <use xlink:href="<?=$assetsPath?>/img/sprite.svg#logo"></use>
                    </svg>
                </a>
                <div class="header__right">
                    <a class="header__link header__link--tel" href="tel:+79520966688">
                        +7 (952) 096-66-88
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main class="main">