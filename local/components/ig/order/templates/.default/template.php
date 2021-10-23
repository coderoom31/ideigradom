<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

    <div class="cart__promo">
        <form class="form" id="promo-form">
            <?
            $errorType = '';
            $statusClass = '';
            $coupon = $arResult['COUPON']['COUPON'];
            if ($arResult['COUPON']['STATUS_TEXT'] === 'не применен'){
                $statusClass = 'error';
                $errorType = '1';
            } elseif($arResult['COUPON']['STATUS_TEXT'] === 'не найден'){
                $statusClass = 'error';
                $errorType = '2';
            } elseif($arResult['COUPON']['STATUS_TEXT'] === 'применен') {
                $statusClass = 'success';
            }
            ?>

            <div class="form__input form__input--promo <?=$statusClass?>">
                <input value="<?=$coupon?>" type="text" id="promo-text" name="promo-text">
                <label for="promo-text">Введите промокод</label>

                <?if($errorType === '1'){?>
                    <span class="error">
                        Промокод не действует на товары в корзине
                    </span>
                <?} elseif($errorType === '2'){?>
                    <span class="error">
                        Промокод не найден. Проверьте его написание.
                    </span>
                <?}?>

                <span class="success">
                    Промокод применен
                </span>
            </div>

            <button class="cart__promo-btn cart__promo-btn--submit btn btn--border" type="submit">
                Применить
            </button>

            <button class="cart__promo-btn cart__promo-btn--delete btn btn--border" type="reset">
                Удалить
            </button>
        </form>
    </div>



    </div>

    <div class="cart__form" style="">
        <form class="validate-form" id="order-form">
            <ol class="cart__list">

                <li class="cart__item">
                    <h2 class="cart__h2">Контактные данные</h2>
                    <div class="form__grid">
                        <div class="form__input form__input--promo">
                            <input type="text" id="order-text" name="order-text"
                                   value="<?=$arResult['USER']['NAME'];?>">
                            <label for="order-text">Имя</label>
                        </div>
                        <div class="form__input">
                            <input type="tel" id="order-tel" name="order-tel"
                                   value="<?= $arResult['USER']['PERSONAL_PHONE'];?>">
                            <label for="order-tel">Мобильный телефон</label>
                        </div>
                        <div class="form__input">
                            <input type="email" id="order-email" name="order-email"
                                   value="<?= $arResult['USER']['EMAIL']; ?>">
                            <label for="order-email">Электонная почта</label>
                        </div>
                    </div>
                </li>

                <li class="cart__item">
                    <h2 class="cart__h2">Способ получения</h2>

                    <? $APPLICATION->IncludeComponent('ig:city-selection', ''); ?>

                    <div class="form__input form__input--city" style="display: none;">
                        <input type="text" id="order-city" name="order-city">
                        <label for="order-city">
                            Город
                        </label>
                    </div>

                    <div id="delivery" class="form__tab-list" data-tag="tabs" style="display: none;">
                        Показать
                    </div>

                    <div class="form__tab-block active" data-tab-block="0">

                    </div>
                </li>

                <li id="paymentWrapper" class="cart__item" style="display: none;">
                    <h2 class="cart__h2">Способ оплаты</h2>
                    <div id="payment" class="form__tab-list">
                        <div class="form__tab">

                        </div>
                    </div>
                </li>

            </ol>
        </form>
    </div>
    </div>

    <div class="cart__right">
        <div class="cart__table js-total">
            <table>
                <tr>
                    <td data-total-amount></td>
                    <td data-cost></td>
                </tr>
                <tr class="discount">
                    <td></td>
                    <td data-discount></td>
                </tr>
                <tr>
                    <td>Доставка:</td>
                    <td data-delivery=""></td>
                </tr>
                <tr>
                    <td>Итого:</td>
                    <td data-total></td>
                </tr>
            </table>
        </div>
        <div class="cart__total-submit">
            <button id="submit-order-form" class="cart__btn-submit btn btn--red" type="submit">
                Перейти к оформлению
            </button>
            <p class="cart__submit-text">
                Нажимая на кнопку, вы соглашаетесь на
                <a class="link" href="/">обработку персональных данных</a>
            </p>
        </div>
    </div>
    </div>
    </div>
    <div class="cart__empty">
        <h2 class="cart__empty-title">Ваша корзина пока пуста</h2>
        <a class="btn btn--red" href="/c/">
            Перейти в каталог
        </a>
    </div>
    </section>
