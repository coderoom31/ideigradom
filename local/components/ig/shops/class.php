<? use Bitrix\Main\Loader;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class Shops extends CBitrixComponent
{
    const CACHE_TIME = 36000000;

    public function executeComponent()
    {
        $this->setResultCacheKeys([]);
        if ($this->startResultCache(self::CACHE_TIME)) {
            Loader::includeModule('iblock');

            $this->arResult['POINTS'] = $this->getPoints();
            $this->arResult['CITIES'] = $this->getCities();
            $this->arResult['MAIN_POINT'] = $this->getMainPoint();

            $this->includeComponentTemplate();
        }
    }

    private function getPoints()
    {
        $elements = [];

        $dbElements = CIBlockElement::GetList(
            [],
            ['IBLOCK_ID' => $this->arParams['IBLOCK_ID'], 'ACTIVE' => 'Y'],
            false,
            false,
            [
                'IBLOCK_ID',
                'ID',
                'NAME',
                'PREVIEW_PICTURE',
                'IBLOCK_SECTION_ID',
                'PROPERTY_ADRESS',
                'PROPERTY_METRO',
                'PROPERTY_METRO_COLOR',
                'PROPERTY_PHONE',
                'PROPERTY_COORDINATES',
                'PROPERTY_TAG',
                'PROPERTY_WORK_TIME',
            ]
        );

        while ($element = $dbElements->GetNext()) {
            $elements[$element['IBLOCK_SECTION_ID']][] = $element;
        }

        return $elements;
    }

    private function getCities()
    {
        $sections = [];
        $dbSection = CIBlockSection::GetList(
            [],
            [
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'], 'ACTIVE' => 'Y'
            ],
            false,
            ['ID', 'IBLOCK_ID', 'NAME', 'UF_*']
        );
        while ($section = $dbSection->GetNext()) {
            $sections[] = $section;
        }

        return $sections;
    }

    private function getMainPoint()
    {
        $mainPoint = [];

        if (Cmodule::IncludeModule('asd.iblock')) {
            $arUfIblock = CASDiblockTools::GetIBUF($this->arParams['IBLOCK_ID']);
            $mainPoint['MAPCENTER'] = $arUfIblock["UF_POINT"];
            $mainPoint['ZOOM'] = $arUfIblock["UF_ZOOM"];
        }

        return $mainPoint;
    }


}