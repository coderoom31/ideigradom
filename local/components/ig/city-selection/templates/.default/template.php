<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->addExternalCss($templateFolder . '/selectizee/selectize.default.css');
$this->addExternalCss($templateFolder . '/selectizee/selectize.dropdown.css');
$this->addExternalJS($templateFolder . '/selectizee/selectize.js');
?>
<select class="location-search" id="locationSearch" name="CITY">
    <option value=""></option>
</select>
