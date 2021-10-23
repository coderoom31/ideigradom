<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<section class="section blog">
    <div class="container">
        <h1 class="section__title">Блог</h1>
        <div class="section__block">
            <div class="grid grid--two-cols">
                <!-- items-container -->
                <?php
                foreach ($arResult['ITEMS'] as $item) {
                    ?>
                    <a class="blog-card grid__block" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                        <div class="blog-card__img">

                            <? if ($item['PREVIEW_PICTURE']["ID"] > 0) { ?>
                                <?
                                $picture = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], ['width' => 885, 'height'
                                => 590]);
                                $picture2x = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], ['width' => 885 * 2, 'height' => 590 * 2]);
                                ?>

                                <img src="<?= $picture['src'] ?>" srcset="<?= $picture2x['src'] ?>"
                                     alt="<?= $item['NAME'] ?>"/>

                            <? } else { ?>
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/no-photos.png" alt="<?= $item['NAME'] ?>">
                            <? } ?>

                        </div>
                        <h3 class="blog-card__title"><?= $item['NAME'] ?></h3>
                        <p class="blog-card__descr"><?= $item['PREVIEW_TEXT'] ?></p>
                    </a>
                    <?php
                }
                ?>
                <!-- items-container -->
            </div>
        </div>
    </div>

    <div class="pag pag--bg">
        <!-- pagination-container -->
        <?= $arResult['NAV_STRING']; ?>
        <!-- pagination-container -->
    </div>

</section>

<?
if (!empty($arResult['NAV_RESULT'])) {
    $navParams = array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}
?>

<!--<pre>-->
<!--    --><?php
//    //print_r($arResult);
//    ?>
<!--</pre>-->