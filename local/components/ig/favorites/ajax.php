<?

use Bitrix\Main\{Engine\Controller, SystemException};

class FavoritesAjaxController extends Controller
{
    public function configureActions(): array
    {
        return [
            'add' => [
                'prefilters' => []
            ],
            'remove' => [
                'prefilters' => []
            ]
        ];
    }

    /**
     * Добавляет товар в избранное и возвращает количество товара в избранном
     * @param int $productId
     * @return int
     * @throws SystemException
     */
    public function addAction(int $productId)
    {
        $favorites = new \IG\HelperFavorites();
        return $favorites->addFavoriteToCookie($productId);
    }

    /**
     * Удаляет товар из избранного и возвращает количество товара в избранном
     * @param int $productId
     * @return int
     * @throws SystemException
     */
    public function removeAction(int $productId)
    {
        $favorites = new \IG\HelperFavorites();
        return $favorites->removeFavoriteToCookie($productId);
    }
}