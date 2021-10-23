<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>


<section class="section section--top text-page">
    <div class="container">
        <div class="section__big-wrap">
            <div class="section__block">
                <div class="text-page__head text-page__flex text-page__flex--center">
                    <div class="text-page__block">
                        <? if ($arResult['ELEMENT']['DETAIL_PICTURE'] > 0) { ?>
                            <?
                            $picture = CFile::ResizeImageGet($arResult['ELEMENT']['DETAIL_PICTURE'], ['width'
                            => 840, 'height' => 840]);
                            $picture2x = CFile::ResizeImageGet($arResult['ELEMENT']['DETAIL_PICTURE'], ['width'
                            => 840 * 2, 'height' => 840 * 2]);
                            ?>

                            <img src="<?= $picture['src'] ?>" srcset="<?= $picture2x['src'] ?>"
                                 alt="<?= $arResult['ELEMENT']['NAME'] ?>"/>

                        <? } else { ?>
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/no-photos.png" alt="<?= $arResult['ELEMENT']['NAME'] ?>">
                        <? } ?>
                    </div>
                    <div class="text-page__block">
                        <h1><?= $arResult['ELEMENT']['NAME'] ?></h1>
                        <p>Одно из самых значимых событий в мире крафта и авторского творчества состоится в последние
                            выходные октября в Москве. Гости увидят тысячи уникальных работ от лучших мастеров со всей
                            страны.</p>
                        <p>31 октября — 1 ноября в Москве состоится городской Всероссийский фестиваль творчества ручной
                            работы ArtFlection.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section__small-wrap section__small-wrap--center">
            <div class="text-page__body">
                <?=$arResult['ELEMENT']['DETAIL_TEXT']?>
            </div>
            <div class="text-page__footer">
                <div class="share social-likes">
                    <div class="facebook" title="Поделиться ссылкой на Фейсбуке">Нравится</div>
                    <div class="twitter" title="Поделиться ссылкой в Твиттере">Твитнуть</div>
                    <div class="vkontakte" title="Поделиться ссылкой во Вконтакте">Поделиться</div>
                    <div class="odnoklassniki" title="Поделиться ссылкой в Одноклассниках">Класс!</div>
                </div>
            </div>
        </div>
        <? if (count($arResult['LINKED_ELEMENTS']) > 0) { ?>
            <div class="section__big-wrap">
                <div class="section__block">
                    <h2 class="section__title section__title--center">Другие посты</h2>

                    <div class="grid grid--two-cols">
                        <? foreach ($arResult['LINKED_ELEMENTS'] as $item) { ?>
                            <a class="blog-card grid__block blog-card--detail" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                <div class="blog-card__img">
                                    <? if ($item['PREVIEW_PICTURE'] > 0) { ?>
                                        <?
                                        $picture = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], ['width'
                                        => 694, 'height' => 694]);
                                        $picture2x = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], ['width'
                                        => 694 * 2, 'height' => 694 * 2]);
                                        ?>

                                        <img src="<?= $picture['src'] ?>" srcset="<?= $picture2x['src'] ?>"
                                             alt="<?= $item['NAME'] ?>"/>

                                    <? } else { ?>
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/no-photos.png" alt="<?= $item['NAME'] ?>">
                                    <? } ?>
                                </div>
                                <h3 class="blog-card__title">
                                    <?= $item['NAME'] ?>
                                </h3>
                                <p class="blog-card__descr">
                                    <?= $item['PREVIEW_TEXT'] ?>
                                </p>
                            </a>
                        <? } ?>

                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</section>