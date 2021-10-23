<?php
?>
</main>
<footer class="footer footer--cart">
    <div class="container">
        <div class="footer__row">
            <p class="footer__copyright">© Идеи градом 2020</p>
            <a class="footer__link" href="tel:+78126792777">
                +7 (812) 679-27-77
            </a>
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

</body>

</html>