<?php

namespace App\Http\Controllers\User\Services;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListService extends Controller
{

    /**
     * store new wishlist to db for logedIn User
     * @param $AuthUserId
     * @param Product $product
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|bool
     */
    public static function saveForUser($AuthUserId, Product $product)
    {
        $wishlist = Wishlist::query()
                            ->where('user_id', $AuthUserId)
                            ->where('product_id', $product->id)
                            ->get();
        if ($wishlist->count()) {
            return false;
        }
        return Wishlist::query()
                       ->create(['user_id' => $AuthUserId, 'product_id' => $product->id]);

    }

    /**
     * get logedIn User wishlist with pagination
     * @param $userId
     * @param null $perPage
     * @return mixed
     */
    public static function getFor($userId, $perPage = null)
    {
        return Auth::user()
                   ->wishlists()
                   ->paginate($perPage ?? config('shop.perPage'));

    }

    /**
     * delete a wish list
     * @param $id
     */
    public static function remove($id)
    {
        return Wishlist::query()
                       ->where('id', $id)
                       ->first()
                       ->delete();
    }
}
