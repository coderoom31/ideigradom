<?php
?>

<section class="lk section">
    <div class="container">
        <div class="section__wrap">
            <div class="section__block">
                <div class="lk__head">
                    <h1 class="lk__title">Екатерина Константинопольская<span>Email: example@example.ru</span></h1><a
                            class="lk__exit link" href="main.html">Выйти</a>
                    <button class="lk__btn-change btn btn--border js-lk-btn" type="button">Изменить данные</button>
                </div><!-- класс opened - открыть редактирование информации ЛК-->
                <div class="lk__hidden-block form js-lk" style="display: none" data-tag="form">
                    <form class="validate-form" id="lk-form">
                        <div class="lk__grid">
                            <div class="lk__block lk__block--left">
                                <h2 class="lk__subtitle">Личные данные</h2>
                                <div class="form__grid">
                                    <div class="form__input"><input type="text" id="lk-name" name="lk-name"
                                                                    value="Екатерина Константинопольская"><label
                                                for="lk-name">Имя</label></div>
                                    <div class="form__input"><input type="email" id="lk-email" name="lk-email"
                                                                    value="example@example.ru"><label for="lk-email">Email</label>
                                    </div>
                                    <div class="form__input"><input type="tel" id="lk-tel" name="lk-tel"
                                                                    value="+7 (911) 568-671-65"><label for="lk-tel">Телефон</label>
                                    </div>
                                </div>
                            </div>
                            <div class="lk__block lk__block--right">
                                <h2 class="lk__subtitle">Сменить пароль</h2>
                                <div class="form__grid">
                                    <div class="form__input"><input type="password" id="password" name="password"
                                                                    value="1234567890"><label for="password">Новый
                                            пароль</label></div>
                                    <div class="form__input"><input type="password" id="password-conf"
                                                                    name="password-conf" value="1234567890"><label
                                                for="password-conf">Подтвердите новый пароль</label></div>
                                </div>
                            </div>
                            <div class="lk__btns">
                                <button class="lk__btn-submit btn btn--red" type="submit">Сохранить</button>
                                <button class="lk__cancel-btn link link--dotted js-lk-cancel" type="button">Отмена
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="lk__orders">
                    <h2 class="lk__subtitle">Заказы</h2>

                    <pre>
                        <?print_r($arResult);?>
                    </pre>

                    <div class="lk__order-list">
                        <div class="order lk__order-item opened" data-toggle-container="data-toggle-container">
                            <div class="order__head order__row" data-toggle-btn="lk-order-0">
                                <div class="order__col order__col-1">
                                    <p class="order__num">№ 56837</p>
                                    <p class="order__date">24.07.2016</p>
                                </div>
                                <div class="order__col order__col-2">
                                    <p class="order__address">Россия, Санкт-Петербург, Миллионная улица, д.39, 3 этаж,
                                        офис 456</p>
                                    <p class="order__amount">3 товара</p>
                                </div>
                                <div class="order__col order__col-3">
                                    <div class="order__cost cost cost--order">
                                        <p class="cost__val">24 500₽</p>
                                    </div>
                                </div>
                                <div class="order__col order__col-4">
                                    <p class="order__status">Статус заказа:<span class="accepted">Принят</span></p><a
                                            class="order__status-btn btn btn--green" href="#">Оплатить</a>
                                </div>
                            </div>
                            <div class="order__body" data-toggle="lk-order-0" data-tag="toggle">
                                <div class="order__body-item">
                                    <div class="order__col order__col-1"><img src="img/catalog/catalog-1@1x.png"
                                                                              srcset="img/catalog/catalog-1@2x.png 2x"
                                                                              alt="товар"/></div>
                                    <div class="order__col order__col-2"><a class="order__title"
                                                                            href="product-detail.html">Ключница из
                                            натуральной кожи "Исаакиевский собор"</a>
                                        <p class="orders__prop">Натуральная кожа</p>
                                        <p class="orders__prop">19,5 см × 9 см</p>
                                    </div>
                                    <div class="order__col order__col-3">
                                        <div class="order__cost cost cost--cap">
                                            <p class="cost__val">1 × 9 500₽</p>
                                        </div>
                                    </div>
                                    <div class="order__col order__col-4">
                                        <div class="order__cost cost cost--cap">
                                            <p class="cost__val">9 500₽</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__body-item">
                                    <div class="order__col order__col-1"><img src="img/catalog/catalog-2@1x.png"
                                                                              srcset="img/catalog/catalog-2@2x.png 2x"
                                                                              alt="товар"/></div>
                                    <div class="order__col order__col-2"><a class="order__title"
                                                                            href="product-detail.html">Ключница из
                                            натуральной кожи "Исаакиевский собор"</a>
                                        <p class="orders__prop">Натуральная кожа</p>
                                        <p class="orders__prop">19,5 см × 9 см</p>
                                    </div>
                                    <div class="order__col order__col-3">
                                        <div class="order__cost cost cost--cap">
                                            <p class="cost__val">1 × 9 500₽</p>
                                        </div>
                                    </div>
                                    <div class="order__col order__col-4">
                                        <div class="order__cost cost cost--cap">
                                            <p class="cost__val">9 500₽</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__footer order__row">
                                    <div class="order__col">
                                        <p class="order__foorder-title">Способ доставки: Самовывоз</p>
                                        <p class="order__foorder-text">Трек-код: RA301463475RU</p>
                                    </div>
                                    <div class="order__col">
                                        <p class="order__foorder-title">Способ оплаты: Наличные</p>
                                    </div>
                                    <div class="order__col">
                                        <p class="order__total"><span
                                                    class="order__total-text">Стоимость доставки:</span><span
                                                    class="order__total-cost">300₽</span></p>
                                        <p class="order__total order__total--bold"><span class="order__total-text">Итоговая стоимость:</span><span
                                                    class="order__total-cost">999 500₽</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order lk__order-item" data-toggle-container="data-toggle-container">
                            <div class="order__head order__row" data-toggle-btn="lk-order-1">
                                <div class="order__col order__col-1">
                                    <p class="order__num">№ 56837</p>
                                    <p class="order__date">24.07.2016</p>
                                </div>
                                <div class="order__col order__col-2">
                                    <p class="order__address">Россия, Санкт-Петербург, Миллионная улица, д.39, 3 этаж,
                                        офис 456</p>
                                    <p class="order__amount">3 товара</p>
                                </div>
                                <div class="order__col order__col-3">
                                    <div class="order__cost cost cost--order">
                                        <p class="cost__val">24 500₽</p>
                                    </div>
                                </div>
                                <div class="order__col order__col-4">
                                    <p class="order__status">Статус заказа:<span class="paid">Оплачен</span></p>
                                </div>
                            </div>
                            <div class="order__body" data-toggle="lk-order-1" data-tag="toggle">
                                <div class="order__body-item">
                                    <div class="order__col order__col-1"><img src="img/catalog/catalog-1@1x.png"
                                                                              srcset="img/catalog/catalog-1@2x.png 2x"
                                                                              alt="товар"/></div>
                                    <div class="order__col order__col-2"><a class="order__title"
                                                                            href="product-detail.html">Ключница из
                                            натуральной кожи "Исаакиевский собор"</a>
                                        <p class="orders__prop">Натуральная кожа</p>
                                        <p class="orders__prop">19,5 см × 9 см</p>
                                    </div>
                                    <div class="order__col order__col-3">
                                        <div class="order__cost cost cost--cap">
                                            <p class="cost__val">1 × 9 500₽</p>
                                        </div>
                                    </div>
                                    <div class="order__col order__col-4">
                                        <div class="order__cost cost cost--cap">
                                            <p class="cost__val">9 500₽</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__body-item">
                                    <div class="order__col order__col-1"><img src="img/catalog/catalog-2@1x.png"
                                                                              srcset="img/catalog/catalog-2@2x.png 2x"
                                                                              alt="товар"/></div>
                                    <div class="order__col order__col-2"><a class="order__title"
                                                                            href="product-detail.html">Ключница из
                                            натуральной кожи "Исаакиевский собор"</a>
                                        <p class="orders__prop">Натуральная кожа</p>
                                        <p class="orders__prop">19,5 см × 9 см</p>
                                    </div>
                                    <div class="order__col order__col-3">
                                        <div class="order__cost cost cost--cap">
                                            <p class="cost__val">1 × 9 500₽</p>
                                        </div>
                                    </div>
                                    <div class="order__col order__col-4">
                                        <div class="order__cost cost cost--cap">
                                            <p class="cost__val">9 500₽</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order__footer order__row">
                                    <div class="order__col">
                                        <p class="order__foorder-title">Способ доставки: Самовывоз</p>
                                        <p class="order__foorder-text">Трек-код: RA301463475RU</p>
                                    </div>
                                    <div class="order__col">
                                        <p class="order__foorder-title">Способ оплаты: Наличные</p>
                                    </div>
                                    <div class="order__col">
                                        <p class="order__total"><span
                                                    class="order__total-text">Стоимость доставки:</span><span
                                                    class="order__total-cost">300₽</span></p>
                                        <p class="order__total order__total--bold"><span class="order__total-text">Итоговая стоимость:</span><span
                                                    class="order__total-cost">999 500₽</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
