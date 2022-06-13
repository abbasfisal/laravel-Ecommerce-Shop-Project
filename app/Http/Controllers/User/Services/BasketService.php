<?php

namespace App\Http\Controllers\User\Services;

use App\Http\Controllers\Controller;
use App\Models\Basket;

class BasketService extends Controller
{
    /**
     * add proudct to user basket
     * @param $authUserId
     * @param $product_id
     */
    public static function add($authUserId, $product_id)
    {
        $basket = Basket::query()
                        ->where('user_id', $authUserId)
                        ->where('product_id', $product_id)
                        ->first();

        //if exist just add the count number ++
        if (!empty($basket)) {
            $count = 1 + $basket->count;

            $basket->update([
                'count' => $count
            ]);

            return $basket->toArray();
        }

        //wasnt exist , so create it

        $basket = Basket::query()
                        ->create([
                            'user_id'    => $authUserId,
                            'product_id' => $product_id,
                            'count'      => 1
                        ]);

        return $basket;
    }

    /**
     * decrease field count by one step
     * @param int|null $id
     * @param $product_id
     */
    public static function decrease($authUserId, $product_id)
    {
        $basket = Basket::query()
                        ->where('user_id', $authUserId)
                        ->where('product_id', $product_id)
                        ->first();

        if ($basket->count()) {
            //decrase
            $count = (int)$basket->count > 0 ? (int)$basket->count - 1 : 0;

            $basket->update(['count' => $count]);

            return $basket->toArray();
        }
        return false;


    }

    /**
     * Delete a LogedIn User Basket
     * @param int|null $id
     * @param $product_id
     */
    public static function delete($authUserId, $product_id)
    {
        $basket = Basket::query()
                        ->where('user_id', $authUserId)
                        ->where('product_id', $product_id)
                        ->first();

        if (!empty($basket)) {
            $basket->delete();
            return true;
        }
        return false;
    }
}
