<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<section class="section cat">
    <div class="container">
        <h1 class="cat__title">Каталог</h1>
        <div class="menu catalog__menu">

            <div class="menu__block menu__block--cat">
                <div class="menu__wrap">
                    <ul class="menu__grid catalog__menu">
                        <? foreach ($arResult['SECTIONS'] as $section) { ?>
                            <li class="menu__grid-item">
                                <a class="menu__grid-link" href="<?= $section['SECTION_PAGE_URL'] ?>">
                                    <div class="menu__grid-img">

                                        <?
                                        $picture = CFile::ResizeImageGet($section['PICTURE'], ['width' => 410, 'height' => 380]);
                                        $picture2x = CFile::ResizeImageGet($section['PICTURE'], ['width' => 410 * 2, 'height' => 380 * 2]);
                                        ?>

                                        <img src="<?= $picture['src'] ?>"
                                             srcset="<?= $picture2x['src'] ?>"
                                             alt="<?= $section['NAME'] ?>">
                                    </div>
                                    <div class="menu__grid-info">
                                        <h3 class="menu__grid-title"><?= $section['NAME'] ?></h3>
                                        <p class="menu__grid-text"><?= $section['DESCRIPTION'] ?></p>
                                    </div>
                                </a>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>


            <div class="menu__block menu__block--list">
                <div class="menu__wrap">
                    <a class="menu__title" href="<?= CATALOG_COLLECTION_URL ?>">Тематические подборки</a>
                    <ul class="menu__list grid grid--menu">
                        <? foreach ($arResult['COLLECTIONS'] as $section) { ?>
                            <li class="menu__item grid__block">
                                <a class="menu__link btn btn--gray" href="<?= $section['DETAIL_PAGE_URL'] ?>">
                                    <?= $section['NAME'] ?>
                                </a>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="cat__seo">
            <p>
                <?= $arResult['TEXT'] ?>
            </p>
        </div>

    </div>
</section>