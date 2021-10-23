<?php


namespace IG;


use Bitrix\Main\SystemException;

class HelperFavorites
{
    private $request;
    private $userId;

    /**
     * HelperFavorites constructor.
     * @throws SystemException
     */
    public function __construct()
    {
        $this->request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

        global $USER;
        if ($USER->IsAuthorized()) {
            $this->userId = $USER->GetID();
        }
    }


    /**
     * Получает Id избранных товаров из данных записанных в cookie
     * @return int[] Id товаров
     */
    public function getFavoriteFromCookie(): array
    {
        $cookieFavorite = $this->request->getCookie('FAVORITES');
        if ($cookieFavorite) {
            return array_values(unserialize($cookieFavorite));
        } else {
            return [];
        }
    }

    /**
     * Добавляет товар в избранное и записывает данные в cookie
     * @param int $id
     * @return int Количество товара в избранном
     * @throws SystemException
     */
    public function addFavoriteToCookie(int $id): int
    {
        $currentFavorite = $this->getFavoriteFromCookie();
        $currentFavorite[] = $id;
        $currentFavorite = array_unique($currentFavorite);

        $this->saveDataInCookie($currentFavorite);

        return count($currentFavorite);
    }

    /**
     * Удаляет товар из избранного и записывает данные cookie
     * @param int $id
     * @return int Количество товара в избранном
     * @throws SystemException
     */
    public function removeFavoriteToCookie(int $id): int
    {
        $currentFavorite = $this->getFavoriteFromCookie();
        $currentFavorite = $this->removeIdInArray($id, $currentFavorite);

        $this->saveDataInCookie($currentFavorite);

        return count($currentFavorite);
    }

    /**
     * Удаляет указанный id из массива и возвращает его
     * @param $id
     * @param array $array
     * @return array
     */
    private function removeIdInArray(int $id, array $array): array
    {
        if (($key = array_search($id, $array)) !== false) {
            unset($array[$key]);
        }
        return $array;
    }

    /**
     * Сохраняет данные в cookie
     * @param array $data Массив с id товаров
     * @throws SystemException
     */
    private function saveDataInCookie($data)
    {
        $cookie = new \Bitrix\Main\Web\Cookie('FAVORITES', serialize($data));
        \Bitrix\Main\Application::getInstance()->getContext()->getResponse()->addCookie($cookie);
    }
}