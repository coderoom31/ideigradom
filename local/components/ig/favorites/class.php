<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class Favorites extends CBitrixComponent
{
    public function executeComponent()
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $cookieFavorite = $request->getCookie('FAVORITES');

        $this->arResult = unserialize($cookieFavorite);

        $this->includeComponentTemplate();
    }
}