<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var $item array */
?>

<? if (count($item['VALUES']) > 1 ) { ?>
    <div class="cat__block">
        <h3 class="cat__subtitle"><?= $item["NAME"] ?></h3>
        <div class="grid grid--pics">
            <?
            foreach ($item['VALUES'] as $variant) {
                ?>
                <div class="grid__block">
                    <div class="img-link img-link--check img-link--big">
                        <input type="checkbox"
                               id="<?= $variant['CONTROL_ID']; ?>"
                               name="<?= $variant['CONTROL_NAME']; ?>"
                               value="<?= $variant['HTML_VALUE']; ?>"
                            <?
                            if (isset($variant['CHECKED']) === true) {
                                echo 'checked="checked"';
                            }
                            ?>
                        >
                        <label
                                for="<?= $variant['CONTROL_ID']; ?>"
                                aria-label="<?= $variant['VALUE']; ?>">
                            <img src="<?= $variant['FILE']['SRC']; ?>"
                                 alt="<?= $variant['VALUE']; ?>">
                            <span><?= $variant['VALUE']; ?></span>
                        </label>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
<? } ?>