<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>



<?
$this->SetViewTarget('SECTION_TITLE_C');
?>
<?= $arResult['NAME'] ?>
<?php
$this->EndViewTarget();
?>


<?
$this->SetViewTarget('SECTION_COUNT_C');
?>
<?= $arResult['PROPERTY_COUNT_PROD_VALUE'] ?>
<?php
$this->EndViewTarget();
?>

<?
$this->SetViewTarget('SECTION_TOP_SEO_TEXT_C');
?>
<?= $arResult['PREVIEW_TEXT'] ?>
<?php
$this->EndViewTarget();
?>

<?
$this->SetViewTarget('SECTION_BOTTOM_SEO_TEXT_C');
?>
<?= $arResult['DETAIL_TEXT'] ?>
<?php
$this->EndViewTarget();
?>



<?
$this->SetViewTarget('SECTION_ADD_C');
?>
<p class="cat__add-text">А еще у нас есть</p>
<h2 class="cat__add-title"><?= $arResult['LINKED_SECTION']['NAME'] ?></h2>
<a class="cat__add-link btn btn--red" href="<?= $arResult['LINKED_SECTION']['SECTION_PAGE_URL'] ?>">Смотреть</a>
<div class="cat__add-imgs">
    <?
    $sectionPicture = CFile::ResizeImageGet($arResult['PROPERTY_MORE_IMAGE_VALUE'], ['width' => 2147, 'height' => 844]);
    $sectionPicture2x = CFile::ResizeImageGet($arResult['PROPERTY_MORE_IMAGE_VALUE'], ['width' => 2147 * 2, 'height' => 844 *
        2]);
    ?>
    <img src="<?= $sectionPicture['src'] ?>"
         srcset="<?= $sectionPicture2x['src'] ?>" width="2147" height="844"
         alt="<?= $arResult['LINKED_SECTION']['NAME'] ?>">
</div>
<?php
$this->EndViewTarget();
?>
