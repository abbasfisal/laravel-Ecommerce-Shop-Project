<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Services\BasketService;
use App\Http\Controllers\User\Services\WishListService;
use App\Http\Requests\AddBasketRequest;
use App\Models\Basket;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Store new WishList for logedIn User if Product Not Exist in wishlist table
     *
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

    /**
     * get logedIn User WishList
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

    /**
     * add product to urser basket
     */
    public function addBasket(AddBasketRequest $request)
    {

        $result = BasketService::add(Auth::id(), $request);


        if ($result === 'updated') {

            return redirect()
                ->back()
                ->with('succ', config('shop.msg.increase_count'));
        } else {

            return redirect()
                ->back()
                ->with('succ', config('shop.msg.add_basket'));
        }
    }


    /**
     * Decrease count of basket count field one by one
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function decCount(Basket $basket)
    {

        $result = BasketService::decrease(Auth::id(), $basket->id);

        if ($result)
            return redirect()
                ->back()
                ->with('msg', config('shop.msg.dec_count_succ'));

        return redirect()
            ->back()
            ->with('msg', config('shop.msg.dec_count_fail'));
    }


    /**
     * Delete a user basket
     * @param AddBasketRequest $request
     */
    public function delBasket(Basket $basket)
    {

        $result = BasketService::delete(Auth::id(), $basket->id);

        if ($result)
            return redirect()
                ->back()
                ->with('msg', config('shop.msg.delete'));

        return redirect()
            ->back()
            ->with('msg', config('shop.msg.delete_fail'));
    }

    /**
     * show logedIn user all bakset
     *
     */
    public function showAllBasket()
    {
        $baskets = Auth::user()
                       ->baskets()
                       ->get();
        return view('user.basket', compact('baskets'));
    }
}
