<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountService extends Controller
{
    /**
     * store data in db
     * @param Request $request
     */
    public static function create(Request $request)
    {
        if ($request->hasFile('image'))
            $imageName = uploadService::handle($request->file('image'), config('shop.discountImagePath'), 'discount');


        Discount::create([
            'title'      => $request->title,
            'percent'    => $request->percent,
            'image'      => $imageName ?? null,
            'started_at' => $request->started_at,
            'end_at'     => $request->end_at
        ]);

    }

    /**
     * return data with pagination
     * @param null $perPage
     * @return mixed
     */
    public static function getWithPagination($perPage = null)
    {
        return Discount::paginate($perPage ?? config('shop.perPage'));
    }

    /**
     * find coupon by title
     * @param $code
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public static function findByTitle($title)
    {
        return Discount::query()->where('title',$title)->first();
    }

    /**
     * check Discount code is valide
     *
     * @param $title
     * @return bool
     */
    public static function isValidaDiscount($title)
    {
        $discount = self::findByTitle($title);

        return now()->isBetween($discount->started_at , $discount->end_at);
    }
}
