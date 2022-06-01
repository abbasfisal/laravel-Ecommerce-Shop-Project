<?php


namespace App\Http\Controllers\Admin\Services;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{


    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return Category::all();
    }

    public static function createNew(Request $request)
    {

        return Category::query()
                       ->create([
                           Category::c_parent_id => $request->category == 0 ? null : $request->category,
                           Category::c_title     => $request->title,
                           Category::c_slug      => SLUG($request->slug)
                       ]);


    }

    public static function getWithPaginate($perPage = null)
    {
        return Category::query()
                       ->paginate($perPage ?? config('shop.perPage'));
    }
}
