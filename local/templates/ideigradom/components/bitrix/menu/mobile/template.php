<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="menu__block menu__block--nav">
    <div class="menu__wrap">
        <ul class="menu__nav grid grid--menu">
            <?
            foreach ($arResult as $item) {
                if ($item['SELECTED']) {
                    $activeClass = 'active';
                } else {
                    $activeClass = '';
                }
                ?>
                <li class="menu__item grid__block">
                    <a class="menu__link btn btn--gray <?= $activeClass; ?>" href="<?= $item['LINK']; ?>">
                        <?= $item['TEXT']; ?>
                    </a>
                </li>
                <?
            }
            ?>
        </ul>
    </div>
</div>
