<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class Sections extends CBitrixComponent
{
    const CACHE_TIME = 36000000;

    public function executeComponent()
    {
        $this->setResultCacheKeys([]);
        if ($this->startResultCache(self::CACHE_TIME)) {
            \Bitrix\Main\Loader::includeModule('iblock');
            \Bitrix\Main\Loader::includeModule('catalog');

            $this->arResult['SECTIONS'] = $this->getSections();
            $this->arResult['COLLECTIONS'] = $this->getCollections();
            $this->arResult['TEXT'] = $this->getCatalogText();

            $this->includeComponentTemplate();
        }
    }

    private function getSections()
    {
        $sections = [];
        $dbSection = CIBlockSection::GetList(
            [],
            [
                'IBLOCK_ID' => CATALOG_IBLOCK_ID, 'ACTIVE' => 'Y'
            ],
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'DESCRIPTION', 'SECTION_PAGE_URL', 'IBLOCK_SECTION_ID', 'DESCRIPTION', 'PICTURE', 'UF_*']
        );
        while ($section = $dbSection->GetNext()) {
            $sections[] = $section;
        }

        return $sections;
    }

    private function getCollections()
    {
        $elements = [];

        $dbElements = CIBlockElement::GetList(
            [],
            ['IBLOCK_ID' => COLLECTIONS_IBLOCK_ID, 'ACTIVE' => 'Y', 'PROPERTY_ICON' => false],
            false,
            false,
            ['IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL']
        );

        while ($element = $dbElements->GetNext()) {
            $elements[] = $element;
        }

        return $elements;
    }

    private function getCatalogText()
    {
        $catalogText = '';

        $dbIblock = CIBlock::GetList(
            [],
            ['ID' => CATALOG_IBLOCK_ID, 'ACTIVE' => 'Y'],
            false,
        );
        while ($iblock = $dbIblock->Fetch()) {
            $catalogText = $iblock['DESCRIPTION'];
        }

        return $catalogText;
    }
}