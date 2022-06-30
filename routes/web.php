<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


/*
 |------------------------------
 | Register / Login
 |------------------------------
 */

//show register view
Route::view('/register', 'auth.register')
     ->name('show.register');

Route::post('/register', [AuthController::class, 'register'])
     ->name('register');

//show login view
Route::view('/login', 'auth.login')
     ->name('show.login');

Route::post('/login', [AuthController::class, 'login'])
     ->name('login');


//show otp view
Route::view('/otp/verify', 'auth.otp')
     ->name('show.otp');

Route::post('/optcheck', [AuthController::class, 'otpCheck'])
     ->name('otp.check');

Route::view('/get/password', 'auth.password')
     ->name('get.password');

Route::post('/set/password', [AuthController::class, 'setPassword'])
     ->name('set.password');


/*
 |------------------------------
 | User
 |------------------------------
 |
 |
 |
 */
Route::group(['prefix', 'user', 'middleware' => ['userauth']], function () {

    Route::get('/logout', [AuthController::class, 'logout'])
         ->name('logout');


    /*
     |------------------------------
     | wish lists
     |------------------------------
     */
    Route::get('/add/wishlist/{product}', [UserController::class, 'addWishList'])
         ->name('add.wish.user');

    Route::get('/wishlist', [UserController::class, 'getUserWishList'])
         ->name('show.wish.user');

    //remove wishlist
    Route::get('/wishlist/{wishlist}', [UserController::class, 'removeWishList'])
         ->name('del.wish.user')
         ->can('delete', 'wishlist');

    /*
     |------------------------------
     | Product
     |------------------------------
     */
    //add new product to basket , increase count
    Route::post("/basket/add", [UserController::class, 'addBasket'])
         ->name('add.basket.user');

    //increase count step +1
    Route::get('/basket/incr/{basket}', [UserController::class, 'IncreaseCount'])
         ->name('increase.basket.user');

    //decrease proudct in basket count field
    Route::get("/basket/dec/{basket}", [UserController::class, 'decCount'])
         ->name('dec.basket.user');


    /*
     |------------------------------
     | Baskets
     |------------------------------
     */
    //remove basket
    Route::get('/basket/del/{basket}', [UserController::class, 'delBasket'])
         ->name('del.basket.user');


    //show all basket
    Route::match(['get', 'post'], '/basket/show/all', [UserController::class, 'showAllBasket'])
         ->name('all.basket.user');

    //show address
    Route::match(['get', 'post'], '/basket/show/address', [UserController::class, 'showAddress'])
         ->name('address.basket.user');

    Route::post('/basket/add/address', [UserController::class, 'AddAddress'])
         ->name('address.add.user');

    Route::post('/basket/get/state', [UserController::class, 'GetStateByCityId'])
         ->name('state.basket.user');


    //history
    Route::get('/basket/history', [UserController::class, 'userBuyHistory'])
         ->name('history.basket.user');

    //basket item in history
    Route::get('/basket/{order}/items' , [UserController::class , 'getOrderItems'])
        ->name('items.basket.user');

    //pay
    Route::get('/basket/pay/{order}', [UserController::class, 'Pay'])
         ->name('pay.user');
    /*->can('view', 'order');*/

    /*
     |------------------------------
     | comments
     |------------------------------
     |
     |
     |
     */
    Route::post('/add/comment/{product}', [UserController::class, 'addComment'])
         ->name('add.comment.user');


});


/*
 |------------------------------
 | Admin Routes
 |------------------------------
 |
 |
 |
 */
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth', 'adminauth'], function () {
    Route::get('/', [DashboardController::class, 'index'])
         ->name('index.admin.dashboard');

    /*
     |------------------------------
     | Orders
     |------------------------------
     |
     */
    //all order
    Route::get('/orders/all', [OrderController::class, 'index'])
         ->name('index.order');

    //show single order
    Route::get('/orders/single/{order}', [OrderController::class, 'SingleOrder'])
         ->name('single.order');

    //change order status
    Route::post('/order/change/status', [OrderController::class, 'ChangeStatus'])
         ->name('change.status.order');

    //show search Form
    Route::get('/order/search', [OrderController::class, 'ShowSearch'])
         ->name('show.search.order');

    //search
    Route::post('/order/search', [OrderController::class, 'Search'])
         ->name('search.order');
    /*
     |------------------------------
     | category
     |------------------------------
     */

    //show all
    Route::get('/category', [CategoryController::class, 'index'])
         ->name('index.category');

    //store new
    Route::post('/category', [CategoryController::class, 'store'])
         ->name('store.category');

    //show edit form
    Route::get('/category/edit/{category}', [CategoryController::class, 'ShowEdit'])
         ->name('show.edit.category');

    //update category
    Route::post('/category/update', [CategoryController::class, 'Update'])
         ->name('update.category');
    /*
     |------------------------------
     | Brand
     |------------------------------
     */
    //show all
    Route::get('/brand', [BrandController::class, 'index'])
         ->name('index.brand');

    //store new
    Route::post('/brand', [BrandController::class, 'store'])
         ->name('store.brand');

    Route::get('/brand/edit/{brand}', [BrandController::class, 'ShowEdit'])
         ->name('show.edit.brand');

    Route::post('/brand/update', [BrandController::class, 'Update'])
         ->name('update.brand');

    /*
     |------------------------------
     | Color
     |------------------------------
     */
    //show all
    Route::get('/color', [ColorController::class, 'index'])
         ->name('index.color');

    //store new
    Route::post('/color', [ColorController::class, 'store'])
         ->name('store.color');


    //show eidt form
    Route::get('/color/edit/{color}', [ColorController::class, 'ShowEdit'])
         ->name('show.edit.color');

    Route::post('/color/update', [ColorController::class, 'Update'])
         ->name('update.color');

    /*
     |------------------------------
     | Size
     |------------------------------
     */
    //show all
    Route::get('/size', [SizeController::class, 'index'])
         ->name('index.size');

    //store new
    Route::post('/size', [SizeController::class, 'store'])
         ->name('store.size');

    //show edit form
    Route::get('/edit/{size}', [SizeController::class, 'ShowEdit'])
         ->name('show.edit.size');

    Route::post('/edit', [SizeController::class, 'Update'])
         ->name('update.size');
    /*
     |------------------------------
     | City /State
     |------------------------------
     |
     |
     |
     */
    //show all
    Route::get('/City', [CityController::class, 'index'])
         ->name('index.city');

    //store new city
    Route::post('/city', [CityController::class, 'store'])
         ->name('store.city');

    //state view
    Route::get('/city/state', [StateController::class, 'getAllCity'])
         ->name('index.state');


    //get state By City Id
    Route::post('/city/state', [StateController::class, 'getByCityId'])
         ->name('get.state');


    //store new state
    Route::post('/state', [StateController::class, 'store'])
         ->name('store.state');

    /*
     |------------------------------
     | Didsount
     |------------------------------
     */
    //show discount
    Route::get('/discount', [DiscountController::class, 'index'])
         ->name('index.discount');

    //store new discount
    Route::post('/discount', [DiscountController::class, 'store'])
         ->name('store.discount');

    //show edit form
    Route::get('/discount/edit/{discount}', [DiscountController::class, 'ShowEdit'])
         ->name('show.edit.discount');

    //update
    Route::post('/discount/update', [DiscountController::class, 'Update'])
         ->name('update.discount');

    /*
     |------------------------------
     | Product
     |------------------------------
     */
    //all proudct
    Route::get('/product', [ProductController::class, 'index'])
         ->name('index.product');

    //get product by id (more details)
    Route::get('/product/{product}/{slug}', [ProductController::class, 'getProductById'])
         ->name('get.product');

    //show create form
    Route::get('product/create', [ProductController::class, 'create'])
         ->name('create.product');

    //save product to db
    Route::post('/product', [ProductController::class, 'store'])
         ->name('store.product');

    //get subcategory used by ajax in the create form
    Route::post('/product/subcategory', [ProductController::class, 'getSubCategory'])
         ->name('subcategory.product');

    //show edit form
    Route::get('/product/{product}', [ProductController::class, 'ShowEdit'])
         ->name('show.edit.product');

    //update
    Route::post('/product/update', [ProductController::class, 'Update'])
         ->name('update.product');

    /*
     |------------------------------
     | Comments
     |------------------------------
     */
    Route::get('/comments/all', [CommentController::class, 'index'])
         ->name('show.comments');

    Route::get('/comment/{comment}/delete', [CommentController::class, 'delete'])
         ->name('delete.comment');

    Route::get('/comment/{comment}/show', [CommentController::class, 'showComment'])
         ->name('show.comment');

    Route::get('/commnet/{comment}/reply', [CommentController::class, 'addReply'])
         ->name('add.reply.comment');

    Route::get('/comment/{comment}/change-show', [CommentController::class, 'changeShowStatus'])
         ->name('change.show.comment');
});

/*
 |------------------------------
 | home route
 |------------------------------
 |
 |
 |
 */
//index shop
Route::get('/', [HomeController::class, 'index'])
     ->name('index');

//show single product
Route::get('/{product}/{slug}', [HomeController::class, 'getSingleProduct'])
     ->name('get.product.home');


/*
 |------------------------------
 | for test only
 |------------------------------
 |
 |
 |
 */
Route::view('/t', 'singleproduct');

Route::get('/cart/{id}/{title}/{cnt}', function ($id, $title, $cnt) {

    $cart[1] = ['id' => 1, 'title' => 'phone', 'cnt' => 2];
    $cart[2] = ['id' => 2, 'title' => 'tshirt', 'cnt' => 3];

    $cart = serialize($cart);


    $a = cookie('cart', $cart, 20);

    return redirect('/t')->withCookie($a);
    //exist
    //++
    //not exist
    //create
});

Route::view('t', 'testa');

Route::get('/ss', function () {

    $data[1] = ['name' => 're', 'tel' => 2430949];
    $data[2] = ['name' => 're', 'tel' => 2430949];
    $data[3] = ['name' => 're', 'tel' => 2430949];

    $data = serialize($data);
    $mycookie = cookie()->forever('my-data', $data);
    dd($mycookie);
    return redirect('/t')
        ->withoutCookie('a')
        ->with('hii', 'by');


});

/*Route::get('/hi', function () {
    $des = unserialize(request()->cookie('cart'));
    echo "<pre>";
    foreach ($des as $d) {
        if ($d['id'] == 2) {
            dd('yess');
        }
    }
    echo "</pre>";
    dd('get cookie',);
});*/

Route::get('/l', function () {

    return \App\Models\Product::factory(2)
                              ->create();
});

