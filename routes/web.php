<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StateController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('admin.layouts.app');
});


Route::group(['prefix' => 'dashboard'], function () {


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

    /*
     |------------------------------
     | Product
     |------------------------------
     */
    //all proudct
    Route::get('/product', [ProductController::class, 'index'])
         ->name('index.product');

    //show create form
    Route::get('product/create', [ProductController::class, 'create'])
         ->name('create.product');

    Route::post('/product', [ProductController::class, 'store'])
         ->name('store.product');

    Route::post('/product/subcategory', [ProductController::class, 'getSubCategory'])
         ->name('subcategory.product');
});

Route::view('/tt', 'test');

