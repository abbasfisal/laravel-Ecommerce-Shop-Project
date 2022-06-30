<?php

namespace App\Http\Controllers\User\Services;

use App\Http\Controllers\Admin\Services\DiscountService;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Evryn\LaravelToman\FakeRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderServices extends Controller
{


    public static function StoreAddress(int $AuthId, Request $request)
    {
        try {
            DB::beginTransaction();

            //create new order
            $order = self::storeAddressinOrder($AuthId, $request);


            //validate and save discount
            if (!empty($request->code)) {
                $discount = DiscountService::findByTitle($request->code);
                if (!empty($discount) && DiscountService::isValidaDiscount($discount->title)) {
                    $order->update([
                        'discount_id' => $discount->id
                    ]);
                }
            }

            //save basket products to order_items
            OrderItemServices::StoreUserBasket(Auth::id(), $order);


            $orderItems = OrderItemServices::getOrderItemByOrder($order->id);


            $total = null;
            $total_without_on_sale = null;
            $total_with_on_sale = null;

            foreach ($orderItems as $item) {

                if ($item->product->on_sale != null)

                    if (Carbon::now()
                              ->isBetween($item->product->started_at, $item->product->end_at)) {


                        $total += (int)$item->count * (int)$item->product->on_sale;
                        $total_with_on_sale += (int)$item->count * (int)$item->product->on_sale;
                    } else {

                        $total += (int)$item->count * (int)$item->product->price;
                        $total_without_on_sale += (int)$item->count * (int)$item->product->price;
                    }


                else {

                    $total += (int)$item->count * (int)$item->product->price;
                    $total_without_on_sale += (int)$item->count * (int)$item->product->price;
                }

            }


            if ($order->discount != null && now()->isBetween($order->discount->started_at, $order->discount->end_at)) {

                if ($total_with_on_sale != null) {

                    $discount_total = DISCOUNT($total_without_on_sale, $order->discount->percent) + $total_with_on_sale;
                    //save total , discount_total
                    $order->update([
                        'discount_total' => $discount_total,
                        'total'          => $total
                    ]);


                } else {
                    $discount_total = DISCOUNT($total, $order->discount->percent);
                    $order->update([
                        'discount_total' => $discount_total,
                        'total'          => $total
                    ]);
                }

            } else {

                $order->update([
                    'discount_total' => null,
                    'total'          => $total
                ]);

            }


            echo "<pre>";
            //dd($total , $total_with_on_sale , $total_without_on_sale);
            echo "</pre>";

            //------------------------------------

            //delete basket
            BasketService::DeleteAllUserBasket(Auth::id());

            DB::commit();
            return $order;
        } catch (\Exception $e) {

            Log::error($e);
            DB::rollBack();
            dd($e);
        }
    }


    /**
     * get order with status new  by its user_id
     * @param $order
     * @param $AuthId
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function getOrder($order, $AuthId)
    {
        return Order::query()
                    ->where('id', $order)
                    ->where('user_id', $AuthId)
                    ->where('status', Order::status_new)
                    ->first();
    }
    /*
     |------------------------------
     | private Methods
     |------------------------------
     |
     |
     |
     */


    /**
     * @param int $AuthId
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    private static function storeAddressinOrder(int $AuthId, Request $request)
    {
        //check order with status = new is before exist?
        $order = Order::query()
                      ->where('user_id', $AuthId)
                      ->where('status', Order::status_new)
                      ->first();

        //if was exist update the addres
        if (!empty($order)) {
            $order->update([
                'user_id'     => $AuthId,
                'state_id'    => $request->state,
                'phone'       => $request->mobile,
                'postal_code' => $request->postalcode,
                'address'     => $request->address
            ]);

            return $order;
        }

        //else create new order
        return Order::query()
                    ->create([
                        'user_id'     => $AuthId,
                        'state_id'    => $request->state,
                        'phone'       => $request->mobile,
                        'postal_code' => $request->postalcode,
                        'address'     => $request->address
                    ]);

    }

    /**
     * paid was successfull
     * so generate tracking code , paymen code
     * @param Model $order
     * @param FakeRequest $pay_request
     */
    public static function SuccessfullPaid(Model $order, FakeRequest $pay_request)
    {
        $order->update([
            'tracking_code' => Str::random(3) . rand(1111, 9999),
            'status'        => Order::status_paid,
            'payment_code'  => $pay_request->getTransactionId(),
            'paied_date'    => now()->format('Y-m-d H:m:s')
        ]);


    }


    public static function getAllOrder($authId)
    {
        return Order::query()
                    ->where('user_id', $authId)
                    ->get();

    }


}
