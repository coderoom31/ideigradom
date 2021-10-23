<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>


<section class="section shops">
    <div class="container">
        <div class="section__block shops__head">
            <h1 class="shops__title section__title">Где купить</h1>
            <ul class="shops__head-list">
                <li class="shops__head-item">
                    <button class="shops__head-btn btn btn--gray " type="button" data-tab="shops-map">
                        На карте
                    </button>
                </li>
                <li class="shops__head-item">
                    <button class="shops__head-btn btn btn--gray active" type="button" data-tab="shops-list">
                        Списком
                    </button>
                </li>
            </ul>
            <div class="shops__head-select">
                <div class="shops__select select" data-select data-tag="select">
                    <button class="cat__sort-btn select__btn" type="button" data-select-btn>
                        <span>Все города</span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/sprite.svg#arrow-down"></use>
                        </svg>
                    </button>
                    <ul class="select__list">
                        <li class="select__item">
                            <button class="select__link" type="button"
                                    data-tab="city-all"
                                    data-select-link="Все города"
                                    data-zoom="<?=$arResult['MAIN_POINT']['ZOOM']?>"
                                    data-mapcenter="<?=$arResult['MAIN_POINT']['MAPCENTER']?>"
                            >
                                Все города
                            </button>
                        </li>

                        <?foreach ($arResult['CITIES'] as $city){?>
                            <li class="select__item">
                                <button class="select__link" type="button"
                                        data-tab="city-<?=$city['ID']?>"
                                        data-select-link="<?=$city['UF_DECL']?>"
                                        data-zoom="<?=$city['UF_ZOOM']?>"
                                        data-mapcenter="<?=$city['UF_MAPCENTER']?>"
                                >
                                    <?=$city['UF_DECL']?>
                                </button>
                            </li>
                        <?}?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="shops__tab-block " data-tab-block="shops-map">
            <div class="section__block">
                <div class="shops__map map">


                    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=514f0bd8-66d2-44b0-a704-d76d07b42d5b"
                            type="text/javascript"></script>

                    <script>
                        ymaps.ready(initYM);

                        var myMap;

                        function initYM() {
                            var myMap = new ymaps.Map("map", {
                                    center: [<?=$arResult['MAIN_POINT']['MAPCENTER']?>],
                                    zoom: <?=$arResult['MAIN_POINT']['ZOOM']?>
                                },
                            );

                            myMap.geoObjects
                            <?foreach ($arResult['POINTS'] as $city){
                            foreach ($city as $point) {?>
                                .add(new ymaps.Placemark([<?=$point['PROPERTY_COORDINATES_VALUE']?>], {
                                    balloonContent: '<?=$point['NAME'].' '.$point['PROPERTY_ADRESS_VALUE']?>'
                                }, {}))
                            <?}
                            }?>
                            ;

                            $(document).on("click", ".select__link", function (e) {
                                var zoom = $(this).attr('data-zoom');
                                var mapcenter = $(this).attr('data-mapcenter').split(',');

                                myMap.setCenter(mapcenter,zoom);
                            });
                        }
                    </script>

                    <div id="map" style="width: 100%; height: 650px; padding: 0;"></div>

                </div>
            </div>
        </div>
        <div class="shops__tab-block active" data-tab-block="shops-list">
            <? foreach ($arResult['CITIES'] as $city) { ?>
                <div class="shops__tab-block section__block active" data-tab-block="city-<?= $city['ID'] ?>">
                    <h2 class="section__h4"><?= $city['NAME'] ?></h2>
                    <div class="shops-list">
                        <? foreach ($arResult['POINTS'][$city['ID']] as $point) { ?>
                            <div class="shop">
                                <div class="shop__info">
                                    <div class="shop__col-1">
                                        <? if ($point['PROPERTY_TAG_VALUE'] == 'Фирменный магазин') { ?>
                                            <div class="shop__tag company-store">Фирменный магазин</div>
                                        <? } ?>
                                        <? if ($point['PROPERTY_TAG_VALUE'] == 'Ярмарка') { ?>
                                            <div class="shop__tag fair">Ярмарка</div>
                                        <? } ?>
                                        <h3 class="shop__title"><?= $point['NAME'] ?></h3>
                                        <p class="shop__descr"><?= $point['PREVIEW_TEXT'] ?></p>
                                    </div>
                                    <div class="shop__col-2">
                                        <p class="shop__text"><?= $point['PROPERTY_ADRESS_VALUE'] ?></p>
                                        <? if ($point['PROPERTY_METRO_VALUE'] != '') { ?>
                                            <p class="shop__text shop__text--metro">
                                                <span style="border-color: <?= $point['PROPERTY_METRO_COLOR_VALUE'] ?>;"></span>
                                                <?= $point['PROPERTY_METRO_VALUE'] ?>
                                            </p>
                                        <? } ?>
                                        <p class="shop__text"><?= $point['PROPERTY_WORK_TIME_VALUE'] ?></p>
                                    </div>
                                    <div class="shop__col-3">
                                        <a class="shop__link" href="tel:<?= $point['PROPERTY_PHONE_VALUE'] ?>">
                                            <?= $point['PROPERTY_PHONE_VALUE'] ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="shop__img">
                                    <? if ($point['PREVIEW_PICTURE'] > 0) { ?>
                                        <?
                                        $picture = CFile::ResizeImageGet($point['PREVIEW_PICTURE'], ['width' => 225, 'height' =>
                                            150]);
                                        $picture2x = CFile::ResizeImageGet($point['PREVIEW_PICTURE'], ['width' => 225 * 2, 'height'
                                        => 150 * 2]);
                                        ?>
                                        <img src="<?= $picture['src'] ?>" srcset="<?= $picture2x['src'] ?>"
                                             alt="<?= $point['NAME'] ?>"/>
                                    <? } ?>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
</section>

<pre>
    <?//print_r($arResult);?>
</pre>