<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Services\BasketService;
use App\Http\Controllers\User\Services\WishListService;
use App\Http\Requests\AddBasketRequest;
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
        $result = BasketService::add(Auth::id(), $request->product_id);

        return response()->json([$result]);
    }

    /**
     * Decrease count of basket count field one by one
     *
     * @param AddBasketRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function decCount(AddBasketRequest $request)
    {
        $result = BasketService::decrease(Auth::id(), $request->product_id);
        if ($result)
            return response()->json([$result]);

        return response()->json(['error' => ':)']);
    }


    /**
     * Delete a user basket
     * @param AddBasketRequest $request
     */
    public function delBasket(AddBasketRequest $request)
    {
        $result = BasketService::delete(Auth::id(), $request->product_id);

        if ($result) {
            return response()->json(['delete', true]);
        }

        return response()->json(['delete', false]);
    }
}
