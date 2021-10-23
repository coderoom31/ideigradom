<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\UserTable;
use Bitrix\Sale\Basket;
use Bitrix\Sale\DiscountCouponsManager;

class OrderComponent extends CBitrixComponent
{
    private function getUserInfo(): array
    {
        $userFields = [];

        global $USER;
        if ($USER->IsAuthorized()) {
            $user = UserTable::getById($USER->GetID())->fetch();

            $userFields['NAME'] = $user['NAME'];
            $userFields['PERSONAL_PHONE'] = $user['PERSONAL_PHONE'];
            $userFields['EMAIL'] = $user['EMAIL'];
        }

        return $userFields;
    }

    public function executeComponent()
    {
        $basket = Basket::loadItemsForFUser(
            Bitrix\Sale\Fuser::getId(),
            SITE_ID
        );

        if ($basket->isEmpty()) {
            return;
        }

        $this->arResult['COUPON'] = current(DiscountCouponsManager::get(true, [], true, true));

        if (
            $this->arResult['COUPON']['STATUS'] == DiscountCouponsManager::STATUS_APPLYED
            || $this->arResult['COUPON']['STATUS'] == DiscountCouponsManager::STATUS_ENTERED
            || $this->arResult['COUPON']['STATUS'] == DiscountCouponsManager::STATUS_NOT_APPLYED
        ) {
            $this->arResult['COUPON_STATUS'] = true;
        } else {
            $this->arResult['COUPON_STATUS'] = false;
        }

        $this->arResult['USER'] = $this->getUserInfo();

        $this->includeComponentTemplate();
    }
}