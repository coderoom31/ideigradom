<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<ul class="footer__nav">
    <?
    foreach ($arResult as $item) {
        if ($item['SELECTED']) {
            $activeClass = 'active';
        } else {
            $activeClass = '';
        }
        ?>

        <li class="footer__nav-item">
            <a class="footer__nav-link" href="<?= $item['LINK']; ?>">
                <?= $item['TEXT']; ?>
            </a>
        </li>

        <?
    }
    ?>
</ul>