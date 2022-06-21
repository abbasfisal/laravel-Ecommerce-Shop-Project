<?php

namespace App\Http\Controllers\User\Services;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BasketService extends Controller
{
    /**
     * add proudct to user basket
     * @param $authUserId
     * @param $product_id
     */
    public static function add($authUserId, Request $request)
    {
        $basket = Basket::query()
                        ->where('user_id', $authUserId)
                        ->where('product_id', $request->product_id)
                        ->where('size_id', $request->size)
                        ->where('color_id', $request->color)
                        ->first();

        //if exist just add the count number ++
        if (!empty($basket)) {
            $count = 1 + $basket->count;

            $basket->update([
                'count' => $count

            ]);

            return 'updated';
        }

        //wasnt exist , so create it

        $data = Product::query()
                       ->where('id', $request->product_id)
                       ->first();

        if (!empty($data)) {
            $attr_json = $data->toArray();
            $attr_json = Arr::except($attr_json, ['short_description', 'long_description', 'note']);

        }

        Basket::query()
              ->create([
                  'user_id'    => $authUserId,
                  'product_id' => $request->product_id,
                  'size_id'    => $request->size,
                  'color_id'   => $request->color,
                  'attributes' => isset($attr_json) ? json_encode($attr_json) : null,
                  'count'      => 1
              ]);

        return 'added';
    }

    /**
     * decrease field count by one step
     * @param int|null $id
     * @param $product_id
     */
    public static function decrease($authUserId, $basketId)
    {
        $basket = Basket::query()
                        ->where('user_id', $authUserId)
                        ->where('id', $basketId)
                        ->first();


        if ($basket->count()) {
            //decrase

            $count = (int)$basket->count > 1 ? (int)$basket->count - 1 : 1;

            $basket->update(['count' => $count]);

            return true;
        }
        return false;


    }

    /**
     * Delete a LogedIn User Basket
     * @param int|null $id
     * @param $product_id
     */
    public static function delete($authUserId, $basketId)
    {
        $basket = Basket::query()
                        ->where('user_id', $authUserId)
                        ->where('id', $basketId)
                        ->first();

        if (!empty($basket)) {
            $basket->delete();
            return true;
        }
        return false;
    }


    public static function IncreaseCount(Basket $basket)
    {

        $basket->update([
            'count' => (int)$basket->count + 1
        ]);

        return true;
    }

    /**
     * get user basket
     * @param int $AuthId
     */
    public static function getByUserId(int $AuthId)
    {
        return Basket::query()
                     ->where('user_id', $AuthId)
                     ->get()
                     ->toArray();
    }

    /**
     * Delete all  baskets which belong to given User Id
     *
     * @param int|null $id
     */
    public static function DeleteAllUserBasket(int $AuthId)
    {
        return Basket::query()
                     ->where('user_id' , $AuthId)->delete();
    }
}
