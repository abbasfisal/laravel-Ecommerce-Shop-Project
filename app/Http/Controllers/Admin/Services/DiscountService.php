<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        return Discount::query()
                       ->where('title', $title)
                       ->first();
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

        return now()->isBetween($discount->started_at, $discount->end_at);
    }

    public static function Update(Request $request)
    {
        try {
            DB::beginTransaction();

            $discount = Discount::query()
                                ->find($request->id);


            if ($request->image != null) {
                uploadService::RemoveImage($discount->image, config('shop.discountImagePath'));
                $uploadImageName = uploadService::handle($request->image, config('shop.discountImagePath'), 'discount');
            }

            $update_result = $discount->update([
                'title'      => $request->title,
                'percent'    => $request->percent,
                'started_at' => $request->started_at,
                'end_at'     => $request->end_at,
                'image'      => $request->image ? $uploadImageName : $discount->image,
            ]);

            DB::commit();
            return $update_result;

        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return false;
        }


    }
}
