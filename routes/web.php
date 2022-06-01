<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
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
});

