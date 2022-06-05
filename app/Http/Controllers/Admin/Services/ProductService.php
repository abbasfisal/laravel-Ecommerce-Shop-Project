<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductService extends Controller
{

    /**
     * store new data to db
     * @param Request $request
     */
    public static function create(Request $request)
    {


        try {

            DB::beginTransaction();

            //set active
            $request['active'] = $request->has('active') ? true : false;

            //get upload image Name
            $request['image'] = uploadService::handle($request->file('cover'), config('shop.productCoverPath'), 'productCover');

            //save product to proudcts table
            $product = Product::create($request->toArray());


            //attributes
            $result = self::mergAndRemoveNullAttributes($request);

            //save attributes in the proudct_details table
            self::saveProductDetails($result, $product);


            //relation M:N COLOR
            $product->colors()
                    ->sync($request->colors);

            //relation M:N SIZE
            $product->sizes()
                    ->sync($request->sizes);

            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    /**
     * merge attributes and remove the null title or null values
     *
     * @param Request $request
     * @return array
     */
    private static function mergAndRemoveNullAttributes(Request $request): array
    {
        $titles = $request->attr_titles;
        $values = $request->attr_values;

        $merg = array_combine($titles, $values);

        //remove if title or value was null or empty
        $result = collect($merg)
            ->reject(function ($value, $key) {
                return empty($value) || empty($key);
            })
            ->all();
        return $result;
    }

    /**
     * Save Attributes in the product_details Table
     * @param array $result //comes from private method mergAndRemoveNullAttributes
     * @param $product //comes from recently created product in products Table
     */
    private static function saveProductDetails(array $result, $product): void
    {
        foreach ($result as $title => $description) {
            $product->details()
                    ->create([
                        ProductDetail::c_title       => $title,
                        ProductDetail::c_description => $description
                    ]);
        }
    }
}
