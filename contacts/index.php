<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

    <section class="section">
        <div class="container">
            <div class="section__wrap">
                <h1 class="section__title">Контакты</h1>
                <div class="section__block">
                    <div class="grid grid--soc"><a class="grid__block soc-link soc-link--whatsapp" href="#"
                                                   aria-label="Whatsapp">
                            <div class="soc-link__img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/whatsapp.svg"
                                                            alt="Whatsapp"></div>
                            <span class="soc-link__text">Whatsapp</span>
                        </a><a class="grid__block soc-link soc-link--telegram" href="#" aria-label="Telegram">
                            <div class="soc-link__img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/telegram.svg"
                                                            alt="Telegram"></div>
                            <span class="soc-link__text">Telegram</span>
                        </a><a class="grid__block soc-link soc-link--viber" href="#" aria-label="Viber">
                            <div class="soc-link__img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/viber.svg"
                                                            alt="Viber"></div>
                            <span class="soc-link__text">Viber</span>
                        </a><a class="grid__block soc-link soc-link--vk" href="#" aria-label="Вконтакте">
                            <div class="soc-link__img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/vkontakte-big.svg"
                                                            alt="Вконтакте"></div>
                            <span class="soc-link__text">Вконтакте</span>
                        </a><a class="grid__block soc-link soc-link--instagram" href="#" aria-label="Инстаграм">
                            <div class="soc-link__img"><img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/instagram-big.svg"
                                                            alt="Инстаграм"></div>
                            <span class="soc-link__text">Инстаграм</span>
                        </a></div>
                </div>
                <div class="section__block contacts">
                    <table class="contacts__table">
                        <tr>
                            <td>
                                <h2>Адрес</h2>
                            </td>
                            <td>
                                <p>Невский проспект, 30</p><a class="link" href="#">Наш магазины</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>Режим работы </h2>
                            </td>
                            <td>
                                <p>10:00 - 22:00</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>Телефон</h2>
                            </td>
                            <td>
                                <p><a href="tel:+79522702555">7 (952) 270-25-55</a></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>Сотрудничество</h2>
                            </td>
                            <td>
                                <p><a href="tel:+79520966688">7 (952) 096-66-88</a></p>
                                <p><a href="mailto:handmade_radosti@mail.ru">handmade_radosti@mail.ru</a></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>