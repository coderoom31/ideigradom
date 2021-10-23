<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Sale;
use Bitrix\Sale\Basket;
?>
</main>
<footer class="footer">
    <div class="container">
        <div class="footer__wrap">
            <div class="footer__top">

                <?
                $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'footer',
                    [
                        'ROOT_MENU_TYPE' => 'bottom1',
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

                <?
                $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'footer',
                    [
                        'ROOT_MENU_TYPE' => 'bottom2',
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

                <?
                $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'footer',
                    [
                        'ROOT_MENU_TYPE' => 'bottom3',
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

                <ul class="footer__soc">
                    <div class="footer__soc-item">
                        <a class="footer__soc-link" href="#" aria-label="Инстаграм">
                            <img
                                    src="<?= SITE_TEMPLATE_PATH ?>/img/icons/instagram.svg" alt="Инстаграм">
                        </a>
                    </div>
                    <div class="footer__soc-item">
                        <a class="footer__soc-link" href="#" aria-label="Вконтакте">
                            <img
                                    src="<?= SITE_TEMPLATE_PATH ?>/img/icons/vk.svg" alt="Вконтакте">
                        </a>
                    </div>
                </ul>
            </div>
            <div class="footer__bottom">
                <p class="footer__copyright">© Идеи градом <?= date('Y'); ?></p>
                <a class="footer__link" href="/policy/">Политика конфиденциальности</a>
            </div>
        </div>
    </div>
</footer>
</div>


<div class="overlay js-overlay"></div>
<div class="modal" id="modal-add-cart">
    <div class="modal__container">
        <div class="modal__wrap modal__wrap--small">
            <h2 class="modal__h1">Товар в корзине</h2>
            <!-- img 1x width: 1000px; height: 697px;, 2x width: 2000px; height: 1394px;-->
            <div class="modal__prod-card"></div>

            <div class="modal__submit">
                <a class="modal__btn btn btn--red" href="/cart/">Перейти</a>
                <button class="modal__btn btn btn--border js-modal-close" type="button">Продолжить покупки</button>
            </div>
        </div>
    </div>
</div>

<?
$APPLICATION->IncludeComponent('ig:auth', '');
?>


<?
$favorite = new \IG\HelperFavorites();
$favoriteIds = $favorite->getFavoriteFromCookie();
$favoriteCount = count($favoriteIds);

Loader::includeModule('sale');
$basket = Bitrix\Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
$basketCount = $basket->count();

if ($favoriteIds || $basketCount > 0) {
    ?>
    <script>
        $(document).ready(function() {
            window.favoriteList = <?= CUtil::PhpToJSObject($favoriteIds); ?>;
            window.ideigradom.favorite.showAddedElement();
            window.ideigradom.favorite.setCount(<?= $favoriteCount ?>);
            window.ideigradom.cart.setCount(<?= $basketCount ?>);
        });
    </script>
    <?
}
?>

</body>

</html>