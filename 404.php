<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");
CHTTP::setStatus("404 Not Found");
?>
    <section class="error-page">
        <div class="container">
            <div class="error-page__wrap">
                <h1 class="error-page__title">404</h1>
                <h2 class="error-page__lead">Страница не найдена</h2>
                <p class="error-page__text">Возможно в адресе есть опечатка или мы перенесли страницу в другое место.
                    Проверьте адрес или перейдите на главную страницу.</p>
                <a class="error-page__link link" href="/">
                    На главную
                </a>
            </div>
        </div>
    </section>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>