<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class CollectionsList extends CBitrixComponent
{
    const CACHE_TIME = 36000000;

    public function executeComponent()
    {
        $this->setResultCacheKeys([]);
        if ($this->startResultCache(self::CACHE_TIME)) {
            \Bitrix\Main\Loader::includeModule('iblock');
            \Bitrix\Main\Loader::includeModule('catalog');

            $this->arResult['COLLECTIONS'] = $this->getCollections();
            $this->arResult['TEXT'] = $this->getCollectionsText();

            $this->includeComponentTemplate();
        }
    }

    private function getCollections()
    {
        $elements = [];

        $dbElements = CIBlockElement::GetList(
            [],
            ['IBLOCK_ID' => COLLECTIONS_IBLOCK_ID, 'ACTIVE' => 'Y'],
            false,
            false,
            ['IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_ICON', 'PROPERTY_COUNT_PROD', 'PREVIEW_PICTURE', 'IBLOCK_SECTION_ID']
        );

        while ($element = $dbElements->GetNext()) {
            $elements[$element['IBLOCK_SECTION_ID']][] = $element;
        }

        return $elements;
    }

    private function getCollectionsText()
    {
        $catalogText = [];

        $dbIblock = CIBlock::GetList(
            [],
            ['ID' => COLLECTIONS_IBLOCK_ID, 'ACTIVE' => 'Y'],
            false,
        );
        while ($iblock = $dbIblock->Fetch()) {
            $catalogText['TOP_SEO_TEXT'] = $iblock['DESCRIPTION'];

        }

        if (Cmodule::IncludeModule('asd.iblock')) {
            $arUfIblock = CASDiblockTools::GetIBUF(COLLECTIONS_IBLOCK_ID);
            $catalogText['BOTTOM_SEO_TEXT'] = $arUfIblock["UF_BOTTOM_SEO_TEXT"];
        }

        return $catalogText;
    }
}