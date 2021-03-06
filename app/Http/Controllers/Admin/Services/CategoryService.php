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
        return Category::where('parent_id', null)
                       ->get();
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

    /**
     * check category is as a parent or not
     * @param Category $category
     */
    public static function CheckIsParent(Category $category)
    {
        return $category->parent_id === null ? false : true;
    }


    /**
     * Update a Category
     * @param Request $request
     * @return bool|int
     */
    public static function Update(Request $request)
    {
        $category = Category::query()
                            ->find($request->id);

        return $category->update([
            'title'     => $request->title,
            'slug'      => $request->slug,
            'parent_id' => $request->category == 0 ? null : $request->category
        ]);
    }

    /**
     * get main category count
     * @return int
     */
    public static function MainCategoryCount()
    {
        return Category::query()
                       ->where(Category::c_parent_id, null)
                       ->count();
    }


    /**
     * get menue
     * @return array
     */
    public static function getMenue()
    {
        $maincategories = CategoryService::getMainCategories();

        foreach ($maincategories as $key => $cat) {

            $data['data'][$key] = ['title' => $cat->title, 'id' => $cat->id];

            if ($cat->subcategories()
                    ->count()) {
                foreach ($cat->subcategories as $key1 => $sub)
                    $data['data'][$key]['data'] [$key1] = ['title' => $sub->title, 'id' => $sub->id];
            }

        }

        return $data;

    }
}
