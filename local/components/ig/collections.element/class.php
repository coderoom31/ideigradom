<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\Component\Tools;
use Bitrix\Main\Loader;

class CollectionsElement extends CBitrixComponent
{
    private function getLinkedSection($sectionID)
    {
        $sectionInfo = [];

        $dbSection = CIBlockSection::GetList(
            [],
            [
                'IBLOCK_ID' => CATALOG_IBLOCK_ID, 'ACTIVE' => 'Y', 'ID' => $sectionID
            ],
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'SECTION_PAGE_URL']
        );
        while ($section = $dbSection->GetNext()) {
            $sectionInfo = $section;
        }

        return $sectionInfo;
    }

    public function executeComponent()
    {
        Loader::includeModule('iblock');

        $arElement = CIBlockElement::GetList(
            [],
            [
                'ID' => $this->arParams['ID'],
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                'ACTIVE' => 'Y'
            ],
            false,
            false,
            ['NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT', 'PROPERTY_COUNT_PROD', 'PROPERTY_MORE_SECTION', 'PROPERTY_MORE_IMAGE']
        )
            ->GetNext();

        if($arElement['PROPERTY_MORE_SECTION_VALUE'] > 0){
            $arElement['LINKED_SECTION'] = $this->getLinkedSection($arElement['PROPERTY_MORE_SECTION_VALUE']);
        }

        $this->arResult = $arElement;

        $this->includeComponentTemplate();
    }
}