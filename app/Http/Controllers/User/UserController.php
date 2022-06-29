<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\Services\CityService;
use App\Http\Controllers\Admin\Services\DiscountService;
use App\Http\Controllers\Admin\Services\MenueService;
use App\Http\Controllers\Admin\Services\ProductService;
use App\Http\Controllers\Admin\Services\StateService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Services\BasketService;
use App\Http\Controllers\User\Services\CommentService;
use App\Http\Controllers\User\Services\OrderServices;
use App\Http\Controllers\User\Services\WishListService;
use App\Http\Requests\AddBasketRequest;
use App\Http\Requests\AddCommentRequest;
use App\Http\Requests\CheckCouponRequest;
use App\Http\Requests\DiscountRequest;
use App\Http\Requests\GetStateByCityIDRequest;
use App\Http\Requests\StoreUserOrderAddressRequest;
use App\Http\Requests\UserOrderPayRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $menue;

    public function __construct()
    {
        $this->menue = MenueService::getMenuAndSetCache();
    }


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

        $data = $this->menue;
        return view('user.wishlist', compact('wishlists', 'data'));
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
    public function showAllBasket(DiscountRequest $request)
    {
        $baskets = Auth::user()
                       ->baskets()
                       ->get();

        $data = $this->menue;


        if ($request->isMethod('post')) {

            $discount = DiscountService::findByTitle($request->title);

            if ($this->isValidCoupon($discount)) {

                $coupon = $discount->toArray();
                return view('user.basket', compact('baskets', 'coupon', 'data'));

            } else {
                $coupon_valid = config('shop.msg.coupon_expired');
                return view('user.basket', compact('baskets', 'coupon_valid', 'data'));
            }
        }


        return view('user.basket', compact('baskets', 'data'));
    }

    /**
     * Increase coloumn Count
     */
    public function IncreaseCount(Basket $basket)
    {
        $result = BasketService::IncreaseCount($basket);

        if ($result) {
            return redirect()
                ->back()
                ->with('msg', config('shop.msg.increase_count'));
        }

        return redirect()
            ->back()
            ->with('msg', config('increase_count_fail'));


    }

    /**
     * Coupon must be valid from (start date , end date )
     * @param $discount
     * @return bool
     */
    private function isValidCoupon($discount): bool
    {
        return !empty($discount) && now()->isBetween($discount->started_at, $discount->end_at);
    }

    /**
     * Show Add Address View
     * @param CheckCouponRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAddress(CheckCouponRequest $request)
    {
        $cities = CityService::getAll();
        $data = $this->menue;
        if (isset($request->code)) {
            //coupon code(title)
            $code = $request->code;
            return view('user.address', compact('code', 'cities', 'data'));
        }

        return view('user.address', compact('cities', 'data'));

    }

    /**
     * Store user Address
     */
    public function AddAddress(StoreUserOrderAddressRequest $request)
    {

        $order = OrderServices::StoreAddress(Auth::id(), $request);

        $data = $this->menue;

        return view('user.orderfactor', compact('order', 'data'));


    }


    public function GetStateByCityId(GetStateByCityIDRequest $request)
    {
        if ($request->wantsJson()) {
            $states = StateService::getJsonStates($request->city_id);
            return response()->json($states);
        }
    }

    public function Pay($order)
    {

        $order = OrderServices::getOrder($order, Auth::id());

        if (empty($order)) {
            return abort(404);
        }

        self::CheckInventry($order);

        if ($order->discount_total) {

            //discount must pay
            $pay_request = Toman::fakeRequest()
                                ->successful()
                                ->withTransactionId(Str::random(4) . rand(1111, 9999));

        } else {
            //total must pay
            $pay_request = Toman::fakeRequest()
                                ->successful()
                                ->withTransactionId(Str::random(4) . rand(1111, 9999));

        }

        $data = $this->menue;
        if ($pay_request->successful()) {


            OrderServices::SuccessfullPaid($order, $pay_request);

            self::ReduceInventry($order);

            return view('user.order_result', compact('order', 'data'));
        }

        if ($pay_request->failed()) {
            $order->update([
                'status' => Order::status_fail,
            ]);
        }

    }


    public function addComment(AddCommentRequest $request, Product $product)
    {
        $create_result = CommentService::create($request, Auth::id(), $product);

       
        if ($create_result)
            return redirect()
                ->back()
                ->with('succ', config('shop.msg.succ_comment'));

        return redirect()
            ->back()
            ->with('fail', config('shop.msg.fail_comment'));
    }

    /*
     |------------------------------
     | private methods
     |------------------------------
     |
     |
     |
     */


    /**
     * Before Pay
     * Check the Stock of product ,
     * if not available then return product which is not availble
     * @param $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public static function CheckInventry($order)
    {
        $stock_unavailable = null;

        //check stock invetnry
        foreach ($order->orderItems as $item) {

            if ($item->product->stock < $item['count']) {

                $stock_unavailable[] = [
                    'title' => $item->product->title,
                    'image' => $item->product->image,
                    'stock' => $item->product->stock
                ];
            }
        }


        if (!empty($stock_unavailable))
            return view('user.unavailablestuck', compact('stock_unavailable'));

    }

    /**
     * if paid was successfull , then reduce the stock count inventry
     * @param Model $order
     */
    private static function ReduceInventry(Model $order)
    {
        foreach ($order->orderItems as $item) {
            ProductService::DecreaseStockCount($item);

        }

    }
}
