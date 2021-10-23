<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");
?>

    <section class="section text-page">
        <div class="container">
            <div class="section__wrap">
                <div class="section__big-block">
                    <div class="text-page__head">
                        <h2>Доставка</h2>
                    </div>
                    <div class="grid grid--columns">
                        <div class="grid__block">
                            <div class="delivery-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/delivery/sdek.svg" alt="СДЭК"></div>
                            <h2 class="section__subtitle">Доставка СДЭК</h2>
                            <div class="toggle opened" data-toggle-container>
                                <button class="toggle__btn link link--red" type="button" data-toggle-btn="toggle-1">
                                    Доставка курьером по Санкт&#8209;Петербургу и Москве
                                </button>
                                <div class="toggle__block" data-toggle="toggle-1">
                                    <p>Доставка курьером по Санкт-Петербургу и Москве стоит 410 рублей, оплачивается
                                        вместе с заказом. После отправки вам придет трек-номер для отслеживания посылки.
                                        Отследить отправление можно на сайте СДЭК <a class="link link--red"
                                                                                     href="cdek.ru/ru/tracking">cdek.ru/ru/tracking</a>
                                        В день доставки курьер свяжется с вами и уточнит удобное время доставки. В
                                        среднем доставка занимает 2 дня.</p>
                                </div>
                            </div>
                            <div class="toggle opened" data-toggle-container>
                                <button class="toggle__btn link link--red" type="button" data-toggle-btn="toggle-2">
                                    Доставка в пункты выдачи СДЭК в Санкт&#8209;Петербурге и Москве
                                </button>
                                <div class="toggle__block" data-toggle="toggle-2">
                                    <p>Доставка пункты выдачи СДЭК в Санкт-Петербурге и Москве стоит 360 рублей,
                                        оплачивается вместе с заказом.</p>
                                    <p>Выбрать удобный для вас пункт выдачи СДЭК можно на сайте компании по ссылке <a
                                                class="link link--red" href="cdek.ru/ru/offices">cdek.ru/ru/offices</a>
                                        После отправки вам придет трек-номер для отслеживания посылки.</p>
                                    <p>Отследить отправление можно на сайте почты СДЭК <a class="link link--red"
                                                                                          href="cdek.ru/ru/tracking">cdek.ru/ru/tracking</a>
                                        В среднем доставка занимает 2 дня.</p>
                                </div>
                            </div>
                            <div class="toggle opened" data-toggle-container>
                                <button class="toggle__btn link link--red" type="button" data-toggle-btn="toggle-3">
                                    Доставка в пункты выдачи СДЭК в другие города России
                                </button>
                                <div class="toggle__block" data-toggle="toggle-3">
                                    <p>Стоимость Доставки в пункты выдачи в других городах России рассчитывается
                                        автоматически после выбора пункта</p>
                                    <p>Выбрать удобный для вас пункт выдачи СДЭК можно на сайте компании по ссылке <a
                                                class="link link--red" href="cdek.ru/ru/offices">cdek.ru/ru/offices</a>
                                    </p>
                                    <p>После отправки вам придет трек-номер для отслеживания посылки.</p>
                                    <p>Отследить отправление можно на сайте почты СДЭК <a class="link link--red"
                                                                                          href="cdek.ru/ru/tracking">cdek.ru/ru/tracking</a>
                                    </p>
                                </div>
                            </div>
                            <div class="toggle opened" data-toggle-container>
                                <button class="toggle__btn link link--red" type="button" data-toggle-btn="toggle-4">
                                    Доставка курьером СДЭК в другие города России
                                </button>
                                <div class="toggle__block" data-toggle="toggle-4">
                                    <p>Стоимость Доставки в пункты выдачи в других городах России рассчитывается
                                        автоматически после выбора пункта назначения</p>
                                    <p>После отправки вам придет трек-номер для отслеживания посылки.</p>
                                    <p>В день доставки курьер свяжется с вами и уточнит удобное время доставки</p>
                                    <p>Отследить отправление можно на сайте почты СДЭК <a class="link link--red"
                                                                                          href="cdek.ru/ru/tracking">cdek.ru/ru/tracking</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid__block">
                            <div class="delivery-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/delivery/russian-post@1x.png"
                                                           srcset="<?=SITE_TEMPLATE_PATH?>/img/delivery/russian-post@2x.png 2x"
                                                           alt="Почта России"></div>
                            <h2 class="section__subtitle">Доставка Почтой России</h2>
                            <div class="toggle opened" data-toggle-container>
                                <button class="toggle__btn link link--red" type="button" data-toggle-btn="toggle-5">
                                    Доставка Почтой России по России
                                </button>
                                <div class="toggle__block" data-toggle="toggle-5">
                                    <p>Доставка по России стоит 350 рублей, оплачивается вместе с заказом.</p>
                                    <p>Мы отправляем посылки первым классом.</p>
                                    <p>После отправки вам придет трек-номер для отслеживания посылки.</p>
                                    <p>Отследить отправление можно на сайте почты России <a class="link link--red"
                                                                                            href="pochta.ru">pochta.ru</a>.
                                        В среднем доставка занимает 3-7 дней.</p>
                                </div>
                            </div>
                            <div class="toggle opened" data-toggle-container>
                                <button class="toggle__btn link link--red" type="button" data-toggle-btn="toggle-6">
                                    Доставка Почтой России по Миру
                                </button>
                                <div class="toggle__block" data-toggle="toggle-6">
                                    <p>Стоимость доставки по Миру в среднем составляет 500 рублей. <br>Перед заказом
                                        уточните стоимость доставки. <br>Доставка оплачивается вместе с заказом. <br>После
                                        отправки вам придет трек-номер для отслеживания посылки. <br>Отследить
                                        отправление можно на сайте почты России pochta.ru</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__wrap">
                <div class="section__small-wrap">
                    <div class="delivery-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/delivery/visa.svg" alt="VISA"><img
                                src="<?=SITE_TEMPLATE_PATH?>/img/delivery/mir.svg" alt="Мир"><img src="<?=SITE_TEMPLATE_PATH?>/img/delivery/maestro.svg"
                                                                          alt="Maestro"><img
                                src="<?=SITE_TEMPLATE_PATH?>/img/delivery/mastercard.svg" alt="Mastercard"></div>
                    <div class="text-page__head">
                        <h2>Оплата</h2>
                    </div>
                    <h3 class="section__lead">Оплатить заказ вы можете с помощью электронных способов оплаты —
                        пластиковых карт и электронных денег. Оплата зачисляется в течение нескольких минут с момента
                        совершения операции в платёжных системах.</h3>
                    <div class="text-page__body">
                        <h3>Пластиковые карты</h3>
                        <p>Предоставляемая вами персональная информация (имя, адрес, телефон, e-mail, номер карты)
                            является конфиденциальной и не подлежит разглашению. Данные вашей карты передаются только в
                            зашифрованном виде и не сохраняются на нашем Web-сервере.</p>
                        <p>Безопасность обработки Интернет-платежей по пластиковым картам гарантирует банк-эквайер. Все
                            операции с картами происходят в соответствии с требованиями VISA International, MasterCard и
                            других платежных систем. При передаче информации используются специальные технологии
                            безопасности карточных онлайн-платежей, обработка данных ведется на безопасном
                            высокотехнологичном процессинговом сервере.</p>
                        <p>В случае возникновения вопросов по поводу конфиденциальности операций с платёжными картами и
                            предоставляемой вами информации вы можете связаться со службой технической поддержки
                            банка.</p>
                        <p>На странице авторизации потребуется ввести номер карты, имя владельца карты, срок действия
                            карты, верификационный номер карты (CVV2 для VISA или CVC2 для MasterCard). Все необходимые
                            данные пропечатаны на самой карте. Верификационный номер карты — это три цифры, находящиеся
                            на обратной стороне карты.</p>
                        <p>Для оплаты вы будете перенаправлены на страницу банка.</p>
                        <p>Произвести оплату необходимо в течение 15 минут после перехода на страницу авторизации
                            карточки.</p>
                        <p>Транзакция может занять около 40 секунд. Дождитесь завершения операции. Не нажимайте повторно
                            кнопку «Заплатить».</p>
                        <p>Платеж происходит в режиме реального времени и зачисляется в течение 15 минут.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>