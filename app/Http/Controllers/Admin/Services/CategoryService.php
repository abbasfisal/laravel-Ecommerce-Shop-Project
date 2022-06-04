<?php


namespace App\Http\Controllers\Admin\Services;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{


    /**
     * get all category
     *
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return Category::all();
    }

    public static function getMainCategories()
    {
        return Category::where('parent_id', null)->get();
    }

    /**
     * store new data in db
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public static function createNew(Request $request)
    {

        return Category::query()
                       ->create([
                           Category::c_parent_id => $request->category == 0 ? null : $request->category,
                           Category::c_title     => $request->title,
                           Category::c_slug      => SLUG($request->slug)
                       ]);


    }

    /**
     * get data with pagination
     * @param null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getWithPaginate($perPage = null)
    {
        return Category::query()
                       ->paginate($perPage ?? config('shop.perPage'));
    }

    public static function getSubCatByCategory($category_id)
    {
        return Category::query()
                       ->find($category_id)->subcategories;
    }
}
