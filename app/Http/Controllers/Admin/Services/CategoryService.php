<?php


namespace App\Http\Controllers\Admin\Services;


use App\Models\Category;

class CategoryService
{
    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return Category::all();
    }
}
