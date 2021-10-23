<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

$assets = Asset::getInstance();
global $USER;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">

    <title><? $APPLICATION->ShowTitle(); ?></title>

    <meta name="Description" content="Put your description here.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <link rel="apple-touch-icon-precomposed" sizes="57x57"
          href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
          href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
          href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png"
          href="<?=SITE_TEMPLATE_PATH?>/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png"
          href="<?=SITE_TEMPLATE_PATH?>/img/favicon/favicon-16x16.png" sizes="16x16">

    <?
    $assets->addCss(SITE_TEMPLATE_PATH . '/css/style.css');

    $assets->addJs(SITE_TEMPLATE_PATH . '/js/jquery.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/vendor.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/script.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/custom.js');

    $APPLICATION->ShowHead();

    include 'fonts.php';

    ?>

    <script data-skip-moving="true">window.ideigradom = {};</script>
</head>

<body>
<? $APPLICATION->ShowPanel(); ?>
<div class="page">
    <header class="header js-header" data-menu="header">
        <div class="container">
            <div class="header__wrap">
                <div class="header__left">
                    <div class="header__catalog">
                        <button class="header__btn header__btn--cat js-menu-open" type="button"
                                aria-label="Открыть каталог" data-menu="header">
                            <div class="header__btn-icon">
                                <svg class="open" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#burger"></use>
                                </svg>
                                <svg class="close" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#cross"></use>
                                </svg>
                            </div>
                            <span>Каталог</span>
                        </button>
                    </div>
                    <div class="header__nav select">
                        <?
                        $APPLICATION->IncludeComponent(
                            'bitrix:menu',
                            '.default',
                            [
                                'ROOT_MENU_TYPE' => 'top',
                                'MAX_LEVEL' => '1',
                                'CHILD_MENU_TYPE' => '',
                                'USE_EXT' => 'Y',
                                'DELAY' => 'N',
                                'ALLOW_MULTI_SELECT' => 'Y',
                                'MENU_CACHE_TYPE' => 'N',
                                'MENU_CACHE_TIME' => '3600',
                                'MENU_CACHE_USE_GROUPS' => 'Y',
                                'MENU_CACHE_GET_VARS' => '',
                                'CACHE_SELECTED_ITEMS' => 'Y'
                            ]
                        );
                        ?>
                    </div>
                    <div class="header__left-link">
                        <a class="header__link header__link--text" href="/partners/">Партнерам</a>
                    </div>
                </div>
                <a class="header__logo logo" href="/" aria-label="Переход на главную">
                    <svg width="277" height="69" viewBox="0 0 277 69" fill="none">
                        <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#logo"></use>
                    </svg>
                </a>
                <div class="header__right">

                    <a class="header__link header__link--tel" href="tel:+79520966688">
                        +7 (952) 096-66-88
                    </a>

                    <?if(!$USER->IsAuthorized()){?>
                        <a class="header__link js-modal-open" href="#" aria-label="Личный кабинет"
                           data-src="#modal-auth">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#user"></use>
                            </svg>
                        </a>
                    <?} else {?>
                        <a class="header__link" href="/personal/" aria-label="Личный кабинет">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#user"></use>
                            </svg>
                        </a>
                    <?}?>

                    <a class="header__link" href="/favorites/" aria-label="Избранное">
                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#fav"></use>
                        </svg>
                        <span class="header__amount header__amount-favorites">0</span>
                    </a>

                    <a class="header__link" href="/cart/" aria-label="Корзина">
                        <svg width="21" height="25" viewBox="0 0 21 25" fill="none">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#cart"></use>
                        </svg>
                        <span class="header__amount header__amount-cart">0</span>
                    </a>

                </div>
            </div>
            <div class="header__menu">
                <div class="menu">

                    <? $APPLICATION->IncludeComponent(
                        'ig:sections',
                        'menu',
                        [
                        ]
                    ); ?>

                    <?
                    $APPLICATION->IncludeComponent(
                        'bitrix:menu',
                        'mobile',
                        [
                            'ROOT_MENU_TYPE' => 'top',
                            'MAX_LEVEL' => '1',
                            'CHILD_MENU_TYPE' => '',
                            'USE_EXT' => 'Y',
                            'DELAY' => 'N',
                            'ALLOW_MULTI_SELECT' => 'Y',
                            'MENU_CACHE_TYPE' => 'N',
                            'MENU_CACHE_TIME' => '3600',
                            'MENU_CACHE_USE_GROUPS' => 'Y',
                            'MENU_CACHE_GET_VARS' => '',
                            'CACHE_SELECTED_ITEMS' => 'Y'
                        ]
                    );
                    ?>

                </div>
            </div>
        </div>
    </header>
    <main class="main">
