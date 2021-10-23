<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\Component\Tools;
use Bitrix\Main\Loader;

class BlogElement extends CBitrixComponent
{
    public function executeComponent()
    {
        Loader::includeModule('iblock');

        $obElement = CIBlockElement::GetList(
            [],
            [
                'CODE' => $this->arParams['CODE'],
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                'ACTIVE' => 'Y'
            ],
            false,
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'DETAIL_PICTURE', 'DETAIL_TEXT', 'PREVIEW_DETAIL_TEXT']
        )
            ->GetNextElement();

        $arElement = $obElement->GetFields();
        $arElement['PROPERTIES'] = $obElement->GetProperties();

        if(count($arElement['PROPERTIES']['LINKED_ELEMENTS']['VALUE']) > 0){
            $this->arResult['LINKED_ELEMENTS'] = $this->getLinkedElements($arElement['PROPERTIES']['LINKED_ELEMENTS']['VALUE']);
        }

        $this->arResult['ELEMENT'] = $arElement;

        $this->includeComponentTemplate();
    }


    private function getLinkedElements($linkedElements)
    {
        $elements = [];

        $dbElements = CIBlockElement::GetList(
            [],
            [
                'ID' => $linkedElements,
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                'ACTIVE' => 'Y'
            ],
            false,
            false,
            ['IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE']
        );

        while ($element = $dbElements->GetNext()) {
            $elements[] = $element;
        }

        return $elements;
    }
}