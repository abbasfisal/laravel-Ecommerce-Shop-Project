<?php

namespace App\Http\Controllers\User\Services;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderItemServices extends Controller
{
    /**
     * Store Products which is in the  Basket into the `orderitems` Table
     *
     * @param int $AuthId
     * @param Order $order
     */
    public static function StoreUserBasket(int $AuthId, Order $order)
    {

        $products_in_basket = BasketService::getByUserId($AuthId);


        foreach ($products_in_basket as $product) {
            $orderItem = OrderItem::query()
                                  ->create([
                                      'order_id'   => $order->id,
                                      'user_id'    => $AuthId,
                                      'product_id' => $product['product_id'],
                                      'color_id'   => is_null($product['color_id']) ? null : $product['color_id'],
                                      'size_id'    => is_null($product['size_id']) ? null : $product['size_id'],
                                      'count'      => $product['count']
                                  ]);

        }


    }

    public static function getOrderItemByOrder($OrderId)
    {
        return OrderItem::query()
                        ->where('order_id', $OrderId)
                        ->get();
    }

    public static function getOrderProducts(Order $order)
    {
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        return $order->orderItems;

    }
}
