<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ideigradom - Главная страница");
?>

    <main class="main">
        <section class="section section--top banner">
            <div class="container">
                <div class="banner__slider">
                    <div class="slider swiper-container js-banner-slider">
                        <ul class="swiper-wrapper">
                            <li class="swiper-slide">
                                <div class="banner__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/bg/banner-1@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/bg/banner-1@2x.png 2x" alt="Баннер"></div>
                                <div class="banner__info">
                                    <h2 class="banner__title"><a class="link link--black" href="product-detail.html">Мечтай. Исследуй. Верь</a></h2>
                                    <p class="banner__descr">Кошелек “Мечтай. Исследуй. Верь”</p>
                                    <div class="banner__cost cost">
                                        <p class="cost__val">4 390 ₽</p>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="banner__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/bg/banner-1@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/bg/banner-1@2x.png 2x" alt="Баннер"></div>
                                <div class="banner__info">
                                    <h2 class="banner__title"><a class="link link--black" href="product-detail.html">Мечтай. Исследуй. Верь</a></h2>
                                    <p class="banner__descr">Кошелек “Мечтай. Исследуй. Верь”</p>
                                    <div class="banner__cost cost">
                                        <p class="cost__val">4 390 ₽</p>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="banner__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/bg/banner-1@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/bg/banner-1@2x.png 2x" alt="Баннер"></div>
                                <div class="banner__info">
                                    <h2 class="banner__title"><a class="link link--black" href="product-detail.html">Мечтай. Исследуй. Верь</a></h2>
                                    <p class="banner__descr">Кошелек “Мечтай. Исследуй. Верь”</p>
                                    <div class="banner__cost cost">
                                        <p class="cost__val">4 390 ₽</p>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="banner__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/bg/banner-1@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/bg/banner-1@2x.png 2x" alt="Баннер"></div>
                                <div class="banner__info">
                                    <h2 class="banner__title"><a class="link link--black" href="product-detail.html">Мечтай. Исследуй. Верь</a></h2>
                                    <p class="banner__descr">Кошелек “Мечтай. Исследуй. Верь”</p>
                                    <div class="banner__cost cost">
                                        <p class="cost__val">4 390 ₽</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="slider__pag swiper-pagination"></div>
                        <div class="slider__btn swiper-button-prev"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-right"></use>
                            </svg></div>
                        <div class="slider__btn swiper-button-next"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-right"></use>
                            </svg></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--border main-cat">
            <div class="container">
                <div class="grid">
                    <div class="grid__block main-cat__block main-cat__block--left">
                        <div class="section__head">
                            <h2 class="section__head-title"><a class="link link--black" href="catalog-1.html">Каталог</a></h2>
                            <p class="section__head-lead">Подберите памятный подарок с учетом тематики</p>
                        </div>
                        <div class="menu menu--small">
                            <div class="menu__wrap">
                                <ul class="menu__grid menu--small">
                                    <li class="menu__grid-item"><a class="menu__grid-link" href="catalog-2.html">
                                            <div class="menu__grid-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-1@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-1@2x.png 2x" alt="{&quot;title&quot;:&quot;Кошельки&quot;,&quot;descr&quot;:&quot;Портмоне, мини-кошельки&quot;}"></div>
                                            <div class="menu__grid-info">
                                                <h3 class="menu__grid-title">Кошельки</h3>
                                            </div>
                                        </a></li>
                                    <li class="menu__grid-item"><a class="menu__grid-link" href="catalog-2.html">
                                            <div class="menu__grid-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-2@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-2@2x.png 2x" alt="{&quot;title&quot;:&quot;Клатчи&quot;,&quot;descr&quot;:&quot;Кошелек-клатч&quot;}"></div>
                                            <div class="menu__grid-info">
                                                <h3 class="menu__grid-title">Клатчи</h3>
                                            </div>
                                        </a></li>
                                    <li class="menu__grid-item"><a class="menu__grid-link" href="catalog-2.html">
                                            <div class="menu__grid-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-3@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-3@2x.png 2x" alt="{&quot;title&quot;:&quot;Обложки для документов&quot;,&quot;descr&quot;:&quot;Для автодокументов, для паспорта&quot;}"></div>
                                            <div class="menu__grid-info">
                                                <h3 class="menu__grid-title">Обложки для документов</h3>
                                            </div>
                                        </a></li>
                                    <li class="menu__grid-item"><a class="menu__grid-link" href="catalog-2.html">
                                            <div class="menu__grid-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-4@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-4@2x.png 2x" alt="{&quot;title&quot;:&quot;Браслеты&quot;,&quot;descr&quot;:&quot;Многослойные браслеты с вдохновляющими надписями.&quot;}"></div>
                                            <div class="menu__grid-info">
                                                <h3 class="menu__grid-title">Браслеты</h3>
                                            </div>
                                        </a></li>
                                    <li class="menu__grid-item"><a class="menu__grid-link" href="catalog-2.html">
                                            <div class="menu__grid-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-5@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-5@2x.png 2x" alt="{&quot;title&quot;:&quot;Визитницы&quot;}"></div>
                                            <div class="menu__grid-info">
                                                <h3 class="menu__grid-title">Визитницы</h3>
                                            </div>
                                        </a></li>
                                    <li class="menu__grid-item"><a class="menu__grid-link" href="catalog-2.html">
                                            <div class="menu__grid-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-6@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-6@2x.png 2x" alt="{&quot;title&quot;:&quot;Ключницы&quot;}"></div>
                                            <div class="menu__grid-info">
                                                <h3 class="menu__grid-title">Ключницы</h3>
                                            </div>
                                        </a></li>
                                    <li class="menu__grid-item"><a class="menu__grid-link" href="catalog-2.html">
                                            <div class="menu__grid-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-7@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/menu/menu-7@2x.png 2x" alt="{&quot;title&quot;:&quot;Картхолдеры&quot;}"></div>
                                            <div class="menu__grid-info">
                                                <h3 class="menu__grid-title">Картхолдеры</h3>
                                            </div>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid__block main-cat__block main-cat__block--right">
                        <div class="section__head">
                            <h2 class="section__head-title"><a class="link link--black" href="collections.html">Тематические подборки</a></h2>
                            <p class="section__head-lead">Подберите памятный подарок с учетом тематики</p>
                        </div>
                        <div class="main-cat__slider">
                            <div class="slider slider--overlay swiper-container js-collections-slider">
                                <ul class="swiper-wrapper">
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-1.svg" alt="Коты"><span>Коты</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-2.svg" alt="Лисы"><span>Лисы</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-3.svg" alt="Совы"><span>Совы</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-4.svg" alt="Киты"><span>Киты</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-5.svg" alt="Ежики"><span>Ежики</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-6.svg" alt="Собаки"><span>Собаки</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-7.svg" alt="Домики"><span>Домики</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-8.svg" alt="Путешествия"><span>Путешествия</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-9.svg" alt="Маяки"><span>Маяки</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-10.svg" alt="Мосты"><span>Мосты</span></a></li>
                                    <li class="swiper-slide"><a class="img-link" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/filter/cat-pic-11.svg" alt="Растения"><span>Растения</span></a></li>
                                </ul>
                                <div class="slider__btn swiper-button-prev"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-right"></use>
                                    </svg></div>
                                <div class="slider__btn swiper-button-next"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-right"></use>
                                    </svg></div>
                            </div>
                        </div>
                        <div class="menu menu--links">
                            <div class="menu__wrap">
                                <ul class="menu__list grid grid--menu">
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">День Святого Валентина</a></li>
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">8 марта</a></li>
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">Новый год</a></li>
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">День рождения</a></li>
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">Коллеге</a></li>
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">Подруге</a></li>
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">Сестре</a></li>
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">Маме</a></li>
                                    <li class="menu__item grid__block"><a class="menu__link btn btn--gray" href="collection-detail.html">На годовщину</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section cat cat--main">
            <div class="container">
                <div class="section__head">
                    <h2 class="section__head-title"><a class="link link--black" href="#">Новинки</a> и хиты продаж</h2>
                </div>
                <div class="cat__block">
                    <div class="cat__slider slider swiper-container js-mob-products-slider">
                        <div class="cat__grid grid grid--cat swiper-wrapper">
                            <!-- img 1x width: 1000px; height: 697px;, 2x width: 2000px; height: 1394px;-->
                            <div class="prod-card grid__block swiper-slide"><a class="prod-card__link" href="product-detail.html"><button class="prod-card__fav btn js-btn" type="button" aria-label="Добавить в избранное" data-tag="btn"><img class="not-active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-white.svg" alt="Избранное" /><img class="active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-active.svg" alt="Избранное" /></button>
                                    <div class="prod-card__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-1@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-1@2x.png 2x" alt="Карточка товара" /></div>
                                    <div class="prod-card__info">
                                        <div class="prod-card__info-left">
                                            <div class="prod-card__cost cost">
                                                <p class="cost__val">2 270 ₽</p>
                                            </div>
                                            <h3 class="prod-card__title">Обложка для паспорта и автодокументов</h3>
                                        </div>
                                        <div class="prod-card__info-right"><button class="prod-card__cart btn btn--red js-modal-open" type="button" data-src="#modal-add-cart" aria-label="Добавить в корзину"><svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#plus-big"></use>
                                                </svg></button></div>
                                    </div>
                                </a></div><!-- img 1x width: 1000px; height: 697px;, 2x width: 2000px; height: 1394px;-->
                            <div class="prod-card grid__block swiper-slide"><a class="prod-card__link" href="product-detail.html"><button class="prod-card__fav btn js-btn" type="button" aria-label="Добавить в избранное" data-tag="btn"><img class="not-active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-white.svg" alt="Избранное" /><img class="active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-active.svg" alt="Избранное" /></button>
                                    <div class="prod-card__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-2@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-2@2x.png 2x" alt="Карточка товара" /></div>
                                    <div class="prod-card__info">
                                        <div class="prod-card__info-left">
                                            <div class="prod-card__cost cost">
                                                <p class="cost__val">2 270 ₽</p>
                                            </div>
                                            <h3 class="prod-card__title">Обложка для паспорта и автодокументов</h3>
                                        </div>
                                        <div class="prod-card__info-right"><button class="prod-card__cart btn btn--red js-modal-open" type="button" data-src="#modal-add-cart" aria-label="Добавить в корзину"><svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#plus-big"></use>
                                                </svg></button></div>
                                    </div>
                                </a></div><!-- img 1x width: 1000px; height: 697px;, 2x width: 2000px; height: 1394px;-->
                            <div class="prod-card grid__block swiper-slide"><a class="prod-card__link" href="product-detail.html">
                                    <div class="tag prod-card__tag tag--orange"><svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#tag"></use>
                                        </svg><span>Хит!</span></div><button class="prod-card__fav btn js-btn" type="button" aria-label="Добавить в избранное" data-tag="btn"><img class="not-active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-white.svg" alt="Избранное" /><img class="active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-active.svg" alt="Избранное" /></button>
                                    <div class="prod-card__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-3@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-3@2x.png 2x" alt="Карточка товара" /></div>
                                    <div class="prod-card__info">
                                        <div class="prod-card__info-left">
                                            <div class="prod-card__cost cost">
                                                <p class="cost__val">2 270 ₽</p>
                                            </div>
                                            <h3 class="prod-card__title">Обложка для паспорта и автодокументов</h3>
                                        </div>
                                        <div class="prod-card__info-right"><button class="prod-card__cart btn btn--red js-modal-open" type="button" data-src="#modal-add-cart" aria-label="Добавить в корзину"><svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#plus-big"></use>
                                                </svg></button></div>
                                    </div>
                                </a></div><!-- img 1x width: 1000px; height: 697px;, 2x width: 2000px; height: 1394px;-->
                            <div class="prod-card grid__block swiper-slide"><a class="prod-card__link" href="product-detail.html">
                                    <div class="tag prod-card__tag tag--green"><svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#tag"></use>
                                        </svg><span>Новинка</span></div><button class="prod-card__fav btn js-btn" type="button" aria-label="Добавить в избранное" data-tag="btn"><img class="not-active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-white.svg" alt="Избранное" /><img class="active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-active.svg" alt="Избранное" /></button>
                                    <div class="prod-card__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-4@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-4@2x.png 2x" alt="Карточка товара" /></div>
                                    <div class="prod-card__info">
                                        <div class="prod-card__info-left">
                                            <div class="prod-card__cost cost">
                                                <p class="cost__val">2 270 ₽</p>
                                            </div>
                                            <h3 class="prod-card__title">Обложка для паспорта и автодокументов</h3>
                                        </div>
                                        <div class="prod-card__info-right"><button class="prod-card__cart btn btn--red js-modal-open" type="button" data-src="#modal-add-cart" aria-label="Добавить в корзину"><svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#plus-big"></use>
                                                </svg></button></div>
                                    </div>
                                </a></div><!-- img 1x width: 1000px; height: 697px;, 2x width: 2000px; height: 1394px;-->
                            <div class="prod-card grid__block swiper-slide"><a class="prod-card__link" href="product-detail.html"><button class="prod-card__fav btn js-btn" type="button" aria-label="Добавить в избранное" data-tag="btn"><img class="not-active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-white.svg" alt="Избранное" /><img class="active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-active.svg" alt="Избранное" /></button>
                                    <div class="prod-card__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-5@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-5@2x.png 2x" alt="Карточка товара" /></div>
                                    <div class="prod-card__info">
                                        <div class="prod-card__info-left">
                                            <div class="prod-card__cost cost">
                                                <p class="cost__val">2 270 ₽</p>
                                            </div>
                                            <h3 class="prod-card__title">Обложка для паспорта и автодокументов</h3>
                                        </div>
                                        <div class="prod-card__info-right"><button class="prod-card__cart btn btn--red js-modal-open" type="button" data-src="#modal-add-cart" aria-label="Добавить в корзину"><svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#plus-big"></use>
                                                </svg></button></div>
                                    </div>
                                </a></div><!-- img 1x width: 1000px; height: 697px;, 2x width: 2000px; height: 1394px;-->
                            <div class="prod-card grid__block swiper-slide"><a class="prod-card__link" href="product-detail.html"><button class="prod-card__fav btn js-btn" type="button" aria-label="Добавить в избранное" data-tag="btn"><img class="not-active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-white.svg" alt="Избранное" /><img class="active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-active.svg" alt="Избранное" /></button>
                                    <div class="prod-card__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-6@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-6@2x.png 2x" alt="Карточка товара" /></div>
                                    <div class="prod-card__info">
                                        <div class="prod-card__info-left">
                                            <div class="prod-card__cost cost">
                                                <p class="cost__val">2 270 ₽</p>
                                            </div>
                                            <h3 class="prod-card__title">Обложка для паспорта и автодокументов</h3>
                                        </div>
                                        <div class="prod-card__info-right"><button class="prod-card__cart btn btn--red js-modal-open" type="button" data-src="#modal-add-cart" aria-label="Добавить в корзину"><svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#plus-big"></use>
                                                </svg></button></div>
                                    </div>
                                </a></div><!-- img 1x width: 1000px; height: 697px;, 2x width: 2000px; height: 1394px;-->
                            <div class="prod-card grid__block swiper-slide"><a class="prod-card__link" href="product-detail.html"><button class="prod-card__fav btn js-btn" type="button" aria-label="Добавить в избранное" data-tag="btn"><img class="not-active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-white.svg" alt="Избранное" /><img class="active" src="<?=SITE_TEMPLATE_PATH?>/img/icons/fav-active.svg" alt="Избранное" /></button>
                                    <div class="prod-card__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-7@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/catalog/catalog-7@2x.png 2x" alt="Карточка товара" /></div>
                                    <div class="prod-card__info">
                                        <div class="prod-card__info-left">
                                            <div class="prod-card__cost cost">
                                                <p class="cost__val">2 270 ₽</p>
                                            </div>
                                            <h3 class="prod-card__title">Обложка для паспорта и автодокументов</h3>
                                        </div>
                                        <div class="prod-card__info-right"><button class="prod-card__cart btn btn--red js-modal-open" type="button" data-src="#modal-add-cart" aria-label="Добавить в корзину"><svg width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#plus-big"></use>
                                                </svg></button></div>
                                    </div>
                                </a></div>
                        </div>
                        <div class="slider__pag swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--border about">
            <div class="container">
                <div class="about__wrap">
                    <div class="grid grid--two-flex">
                        <div class="grid__block about__block about__block--center">
                            <blockquote class="about__blockquote">
                                <p>«Пусть наши изделия напомнят вам о самом важном в жизни! О тех, кто дорог, даже если вы не рядом прямо сейчас. Об искренних отношениях, тёплых объятиях, долгих уютных разговорах и светлых надеждах. О любви и заботе, которые нужны каждому из нас»</p><cite>Светозара Кацман<span>Основатель и автор</span></cite>
                            </blockquote><a class="about__btn-more btn btn--red" href="#">Подробнее</a>
                        </div>
                        <div class="grid__block about__block">
                            <div class="about__big-img"><img src="<?=SITE_TEMPLATE_PATH?>/img/about/about-1@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/about/about-1@2x.png 2x" alt="Фото"></div>
                        </div>
                    </div>
                </div>
                <div class="about__wrap">
                    <div class="grid grid--two-flex">
                        <div class="grid__block about__block about__block--left">
                            <h2 class="about__title">Про иллюстрации</h2>
                            <p class="about__descr">На изделиях живут добрые истории, автор которых Светозара - создатель «Идеи Градом».</p>
                            <p class="about__descr">Каждая вещь как отдельное послание, которое отзывается внутри и пробуждает тёплые чувства и воспоминания.</p>
                            <div class="about__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/about/about-2@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/about/about-2@2x.png 2x" alt="Фото"></div>
                        </div>
                        <div class="grid__block about__block about__block--right">
                            <h2 class="about__title">Про качество и производство</h2>
                            <p class="about__descr">Идеи Градом — это собственное производство в самом сердце Санкт-Петербурга. Здесь, день за днем, мы создаем кошельки, обложки, клатчи из натуральной кожи. Приятные на ощупь, мягкие и уютные, они надолго останутся с вами и будут радовать.</p>
                            <div class="about__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/about/about-3@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/about/about-3@2x.png 2x" alt="Фото"></div>
                        </div>
                    </div>
                </div>
                <div class="about__wrap">
                    <div class="about__video video js-video" data-tag="video">
                        <div class="video__bg js-video-bg"><img src="<?=SITE_TEMPLATE_PATH?>/img/about/about-video-1@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/about/about-video-1@2x.png 2x" alt="Видео"></div>
                        <div class="video__container"><video preload="metadata" controls>
                                <source src="movies/video.mp4" type="video/mp4">
                                <source src="movies/video.webm" type="video/webm">
                                <source src="movies/video.ogv" type="video/ogg">
                            </video></div><button class="video__btn btn js-video-btn" type="button" aria-label="Начать проигрывание видео"><svg width="36" height="48" viewBox="0 0 36 48" fill="none">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#video-btn"></use>
                            </svg></button>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--border reviews">
            <div class="container">
                <div class="reviews__head section__head">
                    <h2 class="section__head-title">Отзывы</h2>
                    <p class="reviews__lead section__head-lead">В нашей группе огромное количество отзывов, и прочего, текст для примера</p>
                </div>
                <div class="reviews__slider">
                    <div class="slider swiper-container js-reviews-slider">
                        <ul class="swiper-wrapper">
                            <li class="swiper-slide">
                                <div class="reviews__text"><img src="<?=SITE_TEMPLATE_PATH?>/img/shops/shop-1@1x.png"></div>
                            </li>
                            <li class="swiper-slide">
                                <div class="reviews__text"><img src="<?=SITE_TEMPLATE_PATH?>/img/shops/shop-2@1x.png"></div>
                            </li>
                            <li class="swiper-slide">
                                <div class="reviews__text"><img src="<?=SITE_TEMPLATE_PATH?>/img/shops/shop-3@1x.png"></div>
                            </li>
                        </ul>
                        <div class="slider__pag swiper-pagination"></div>
                        <div class="reviews__slider-btns">
                            <div class="slider__btn swiper-button-prev"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-right"></use>
                                </svg></div>
                            <div class="slider__btn swiper-button-next"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-right"></use>
                                </svg></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section soc-section">
            <div class="container">
                <div class="grid grid--two-flex">
                    <div class="grid__block soc-section__block">
                        <div class="soc-section__icon soc-link soc-link--instagram">
                            <div class="soc-link__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/icons/instagram-big.svg" alt="Инстаграм"></div>
                        </div><a class="soc-section__link btn btn--black" href="#"><span>Мы в инстаграм</span><svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-small"></use>
                            </svg></a>
                        <p class="soc-section__text">Фото, новинки, конкурсы и задумки вы можете найти здесь</p>
                        <div class="soc-section__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/bg/instagram@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/bg/instagram@2x.png 2x" alt="Инстаграм"></div>
                    </div>
                    <div class="grid__block soc-section__block">
                        <div class="soc-section__icon soc-link soc-link--vk">
                            <div class="soc-link__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/icons/vkontakte-big.svg" alt="ВКонтакте"></div>
                        </div><a class="soc-section__link btn btn--vk" href="#"><span>Мы в Вконтакте</span><svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-small"></use>
                            </svg></a>
                        <p class="soc-section__text">В нашей группе огромное количество отзывов, и прочего, текст для примера</p>
                        <div class="soc-section__img"><img src="<?=SITE_TEMPLATE_PATH?>/img/bg/vkontakte@1x.png" srcset="<?=SITE_TEMPLATE_PATH?>/img/bg/vkontakte@2x.png 2x" alt="Вконтакте"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>