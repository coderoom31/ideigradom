<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class Sorting extends CBitrixComponent
{
    private $defaultSort = ['SORT' => 'SORT', 'ORDER' => 'ASC'];
    private $sortPossibleValues = ['SORT', 'SHOW_COUNTER', 'CATALOG_PRICE_1'];
    private $orderPossibleValues = ['ASC', 'DESC'];

    private function getRequestSort()
    {
        $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        $sort = $request->getPost('SORT');
        $order = $request->getPost('ORDER');


        if (in_array($sort, $this->sortPossibleValues) && in_array($order, $this->orderPossibleValues)) {
            return ['SORT' => $sort, 'ORDER' => $order];
        } else {
            return false;
        }
    }

    private function getSavedData()
    {
        if (isset($_SESSION['PRODUCT_SORT']) && isset($_SESSION['PRODUCT_ORDER'])) {
            return ['SORT' => $_SESSION['PRODUCT_SORT'], 'ORDER' => $_SESSION['PRODUCT_ORDER']];
        } else {
            return false;
        }
    }

    private function saveSortData($sort, $order)
    {
        $_SESSION['PRODUCT_SORT'] = $sort;
        $_SESSION['PRODUCT_ORDER'] = $order;
    }

    public function executeComponent()
    {
        if ($requestSort = $this->getRequestSort()) {
            $this->arResult = $requestSort;
            $this->saveSortData($requestSort['SORT'], $requestSort['ORDER']);
        } elseif ($savedData = $this->getSavedData()) {
            $this->arResult = $savedData;
        } else {
            $this->arResult = $this->defaultSort;
        }

        $this->includeComponentTemplate();

        return $this->arResult;
    }
}
