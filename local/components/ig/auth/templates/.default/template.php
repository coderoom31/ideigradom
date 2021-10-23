<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>


<div class="modal" id="modal-auth">
    <div class="modal__container">
        <div class="modal__wrap">
            <h2 class="modal__h2">Войти</h2>
            <!--            <div class="modal__soc">-->
            <!--                <p class="modal__soc-text">Через соц. сети:</p>-->
            <!---->
            <!---->
            <!--                --><? //
            ////                	\Bitrix\Main\Loader::includeModule('socialservices');
            ////                	$authManager = new \CSocServAuthManager();
            ////                	$authServices = $authManager->GetActiveAuthServices(['BACKURL' => '', 'FOR_INTRANET' => true]);
            ////
            ////                	$APPLICATION->IncludeComponent(
            ////                		'bitrix:socserv.auth.form',
            ////                		'flat',
            ////                		[
            ////                			'AUTH_SERVICES' => $authServices,
            ////                			'AUTH_URL' => '/personal/'
            ////                		]
            ////                	);
            //                ?>
            <!---->
            <!--                <a class="modal__soc-link soc-link" href="#"-->
            <!--                   aria-label="Facebook">-->
            <!--                    <div class="soc-link__img">-->
            <!--                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none">-->
            <!--                            <use xlink:href="-->
            <? //= SITE_TEMPLATE_PATH ?><!--/img/sprite.svg#facebook"></use>-->
            <!--                        </svg>-->
            <!--                    </div>-->
            <!--                </a>-->
            <!--                <a class="modal__soc-link soc-link" href="#" aria-label="Вконтакте">-->
            <!--                    <div class="soc-link__img">-->
            <!--                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">-->
            <!--                            <use xlink:href="-->
            <? //= SITE_TEMPLATE_PATH ?><!--/img/sprite.svg#vkontakte"></use>-->
            <!--                        </svg>-->
            <!--                    </div>-->
            <!--                </a><a class="modal__soc-link soc-link" href="#" aria-label="Одноклассники">-->
            <!--                    <div class="soc-link__img">-->
            <!--                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none">-->
            <!--                            <use xlink:href="-->
            <? //= SITE_TEMPLATE_PATH ?><!--/img/sprite.svg#odnoklassniki"></use>-->
            <!--                        </svg>-->
            <!--                    </div>-->
            <!--                </a>-->
            <!--            </div>-->
            <div class="modal__form">
                <form class="form validate-form" id="modal-auth-form">
                    <h2 class="modal__h3">С помощью пароля</h2>
                    <div class="form__grid">
                        <div class="form__input">
                            <input type="email" id="modal-auth-email" name="LOGIN[EMAIL]"
                                   data-required="data-required"/>
                            <label for="modal-auth-email">
                                Эл. почта
                            </label>
                        </div>
                        <div class="form__input">
                            <input type="password" id="modal-auth-pass" name="LOGIN[PASSWORD]"
                                   data-required="data-required"/>
                            <label for="modal-auth-pass">
                                Пароль
                            </label>
                        </div>
                        <div class="form__link-pass">
                            <a class="link js-modal-open" data-src="#modal-recovery">Напомнить пароль</a>
                        </div>
                    </div>
                    <div class="modal__submit">
                        <button class="modal__btn btn btn--red" type="submit">Войти</button>
                        <a class="modal__btn btn btn--border js-modal-open" data-src="#modal-reg">
                            Создать аккаунт
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal-reg">
    <div class="modal__container">
        <div class="modal__wrap">
            <h2 class="modal__h2">Создать аккаунт</h2>
            <!--            <div class="modal__soc">-->
            <!--                <p class="modal__soc-text">Через соц. сети:</p><a class="modal__soc-link soc-link" href="#"-->
            <!--                                                                  aria-label="Facebook">-->
            <!--                    <div class="soc-link__img">-->
            <!--                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none">-->
            <!--                            <use xlink:href="-->
            <? //= SITE_TEMPLATE_PATH ?><!--/img/sprite.svg#facebook"></use>-->
            <!--                        </svg>-->
            <!--                    </div>-->
            <!--                </a><a class="modal__soc-link soc-link" href="#" aria-label="Вконтакте">-->
            <!--                    <div class="soc-link__img">-->
            <!--                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">-->
            <!--                            <use xlink:href="-->
            <? //= SITE_TEMPLATE_PATH ?><!--/img/sprite.svg#vkontakte"></use>-->
            <!--                        </svg>-->
            <!--                    </div>-->
            <!--                </a><a class="modal__soc-link soc-link" href="#" aria-label="Одноклассники">-->
            <!--                    <div class="soc-link__img">-->
            <!--                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none">-->
            <!--                            <use xlink:href="-->
            <? //= SITE_TEMPLATE_PATH ?><!--/img/sprite.svg#odnoklassniki"></use>-->
            <!--                        </svg>-->
            <!--                    </div>-->
            <!--                </a>-->
            <!--            </div>-->
            <div class="modal__form">
                <form class="form validate-form" id="modal-reg-form">
                    <h2 class="modal__h3">С помощью пароля</h2>
                    <div class="form__grid">
                        <div class="form__input">
                            <input type="text" id="modal-reg-name" name="REGISTRATION[NAME]"
                                   data-required="data-required"/>
                            <label for="modal-reg-name">
                                Имя
                            </label>
                        </div>
                        <div class="form__input">
                            <input type="email" id="modal-reg-email" name="REGISTRATION[EMAIL]"
                                                        data-required="data-required"/>
                            <label for="modal-reg-email">Эл. почта</label>
                        </div>
                        <div class="form__input">
                            <input type="tel" id="modal-reg-tel" name="REGISTRATION[PHONE]"
                                                        data-required="data-required"/>
                            <label for="modal-reg-tel">
                                Номер телефона
                            </label>
                        </div>
                        <div class="form__input">
                            <input type="password" id="modal-reg-pass" name="REGISTRATION[PASSWORD]"
                                                        data-required="data-required"/>
                            <label for="modal-reg-pass">
                                Пароль
                            </label>
                        </div>
                        <div class="form__input">
                            <input type="password" id="modal-reg-pass-repeat" name="REGISTRATION[CONFIRM_PASSWORD]"
                                                        data-required="data-required"/>
                            <label for="modal-reg-pass-repeat">
                                Повторите пароль
                            </label>
                        </div>
                        <div class="form__checkbox">
                            <input type="checkbox" id="modal-reg-checkbox"
                                                           name="REGISTRATION[CHECKBOX]" checked="checked"/>
                            <label for="modal-reg-checkbox">
                                Подтверждаю согласие с <a class="link" href="/">политикой
                                    конфиденциальности</a
                            </label>
                        </div>
                    </div>
                    <div class="modal__submit">
                        <button class="modal__btn btn btn--red" type="submit">
                            Создать аккаунт
                        </button>
                        <a class="modal__btn btn btn--border js-modal-open" data-src="#modal-auth">
                            Уже есть аккаунт
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-recovery">
    <div class="modal__container">
        <div class="modal__wrap">
            <h2 class="modal__h2">Восстановление пароля</h2>
            <p class="modal__lead">Введите адрес электронной почты, который вы указывали при создании аккаунта</p>
            <div class="modal__form">
                <form class="form validate-form" id="modal-recovery-form">
                    <div class="form__grid">
                        <div class="form__input">
                            <input type="email" id="modal-recovery-email"
                                                        name="modal-recovery-email"
                                                        data-required="data-required"/>
                            <label for="modal-recovery-email">
                                Эл. почта
                            </label>
                        </div>
                    </div>
                    <div class="modal__submit">
                        <button class="modal__btn btn btn--red" type="submit">Восстановить пароль</button>
                        <a class="modal__btn btn btn--border js-modal-open" href="javascript:history.back()"
                           data-src="#modal-auth">Назад</a></div>
                </form>
            </div>
        </div>
    </div>
</div>