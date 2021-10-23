<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<button class="header__btn header__btn--nav select__btn" type="button"
        aria-label="Показать навигацию"><span>Покупателям</span>
    <div class="header__btn-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#arrow-down"></use>
        </svg>
    </div>
</button>

<ul class="select__list">
    <?
    foreach ($arResult as $item) {
        if ($item['SELECTED']) {
            $activeClass = 'active';
        } else {
            $activeClass = '';
        }
        ?>
        <li class="select__item">
            <a class="select__link <?= $activeClass; ?>" href="<?= $item['LINK']; ?>"><?= $item['TEXT']; ?></a>
        </li>
        <?
    }
    ?>
</ul>