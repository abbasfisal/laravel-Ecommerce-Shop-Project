<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Services\WishListService;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Store new WishList for logedIn User if Product Not Exist in wishlist table
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addWishList(Product $product)
    {
        $result = WishListService::saveForUser(Auth::id(), $product);

        if ($result == false) {

            return redirect()
                ->back()
                ->with('succ-add-wishlist', config('shop.msg.was_exist_wishlist'));
        }

        return redirect()
            ->back()
            ->with('succ-add-wishlist', config('shop.msg.add_wishlist'));
    }


    public function getUserWishList()
    {
        $wishlists = WishListService::getFor(Auth::id());

        return view('user.wishlist', compact('wishlists'));
    }

    /**
     * delete a wishlist
     */
    public function removeWishList(Wishlist $wishlist)
    {
        WishListService::remove($wishlist->id);
        return redirect(route('show.wish.user'))->with('succ', config('shop.msg.delete'));
    }
}
