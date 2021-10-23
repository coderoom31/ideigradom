<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<section class="section cat">
    <div class="container">
        <div class="cat__head">
            <h1 class="cat__title">Тематические <br>подборки</h1>
            <p class="cat__descr">
                <?= $arResult['TEXT']['TOP_SEO_TEXT'] ?>
            </p>
        </div>
        <div class="cat__body">
            <div class="cat__block">
                <h3 class="cat__subtitle">Иллюстрации</h3>
                <div class="grid grid--pics">
                    <?
                    foreach ($arResult['COLLECTIONS'][CATALOG_COLLECTION_ILLUSTRATION_SECTION_ID] as $collection) {
                        $collectionImage = CFile::GetPath($collection['PROPERTY_ICON_VALUE']);
                        ?>
                        <div class="grid__block">
                            <a class="img-link img-link--big"
                               href="<?=$collection['DETAIL_PAGE_URL']?>">
                                <img
                                        src="<?= $collectionImage ?>"
                                        alt="<?=$collection['NAME']?>">
                                <span><?=$collection['NAME']?></span>
                            </a>
                        </div>
                        <?
                    }
                    ?>
                </div>
            </div>
            <div class="cat__block">
                <h3 class="cat__subtitle">Тематика</h3>
                <div class="cat__grid grid grid--three-cols">
                    <?
                    foreach ($arResult['COLLECTIONS'][CATALOG_COLLECTION_THEME_SECTION_ID] as $collection) {
                        $picture = CFile::ResizeImageGet($collection['PREVIEW_PICTURE'], ['width' => 392, 'height' =>
                            464]);
                        $picture2x = CFile::ResizeImageGet($collection['PREVIEW_PICTURE'], ['width' => 392 * 2, 'height'
                        => 464 * 2]);
                        ?>
                        <div class="collection grid__block">
                            <a class="collection__link" href="<?=$collection['DETAIL_PAGE_URL']?>">
                                <div class="collection__img">
                                    <img
                                            src="<?= $picture['src'] ?>"
                                            srcset="<?= $picture2x['src'] ?>"
                                            alt="<?=$collection['NAME']?>"/>
                                </div>
                                <div class="collection__info">
                                    <h2 class="collection__title"><?=$collection['NAME']?></h2>
                                    <p class="collection__descr"><?=$collection['PROPERTY_COUNT_PROD_VALUE']?> шт.</p>
                                </div>
                            </a>
                        </div>
                        <?
                    }
                    ?>
                </div>
                <div class="cat__seo">
                    <p>
                        <?= $arResult['TEXT']['BOTTOM_SEO_TEXT'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>