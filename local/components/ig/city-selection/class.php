<?

use Bitrix\Main\Engine\{ActionFilter\Authentication, Contract\Controllerable};

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class CitySelection extends CBitrixComponent implements Controllerable
{
    public function configureActions(): array
    {
        return [
            'search' => [
                'prefilters' => []
            ]
        ];
    }

    public function searchAction($q)
    {
        $location = new \IG\HelperLocation();
        return $location->search($q);
    }

    public function executeComponent()
    {
        $this->includeComponentTemplate();
    }
}
