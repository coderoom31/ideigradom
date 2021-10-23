<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use IG\GarbageStorage;

GarbageStorage::set('SET', $arResult['PROPERTIES']['SET']['VALUE']);
GarbageStorage::set('OTHER_ILLUSTRATIONS', $arResult['PROPERTIES']['OTHER_ILLUSTRATIONS']['VALUE']);
GarbageStorage::set('WITH_BUY', $arResult['PROPERTIES']['WITH_BUY']['VALUE']);