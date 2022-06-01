<?php

use App\Http\Controllers\Admin\CategoryController;
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

    Route::get('/category', [CategoryController::class, 'index'])
         ->name('index.category');

});

