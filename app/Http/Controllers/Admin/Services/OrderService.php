<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderService extends Controller
{
    /**
     * get latest order
     */
    public static function getLatest($perPage = null)
    {
        return Order::query()
                    ->orderByDesc('id')
                    ->paginate(config('shop.perPage'));
    }

    /**
     * check the status is exist in the status array in the model Order
     * @param $status
     */
    public static function CheckStatus($status)
    {
        return Order::IsStatusExist($status);

    }

    public static function ChangeStatus($order, $status)
    {
        $order = Order::query()
                      ->find($order);
        return $order->update([
            'status' => $status
        ]);
    }

    /**
     * Search Order columns payment_code | Tracking Code
     *
     * @param $code
     */
    public static function Search($code)
    {
        return Order::query()
                    ->where('tracking_code', $code)
                    ->orWhere('payment_code', $code)->first();
    }


    /**
     * get orders count with status = new
     * @return int
     */
    public static function newCount()
    {
        return Order::query()->where('status', Order::status_new)->count();
    }


    /**
     * get all orders count
     * @return int
     */
    public static function allCount()
    {
        return Order::query()->count();
    }
}
