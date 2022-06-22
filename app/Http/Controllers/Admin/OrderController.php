<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeOrderStatusRequest;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * show all orders
     */
    public function index()
    {
        $orders = OrderService::getLatest();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * show single order
     */
    public function SingleOrder(Order $order)
    {

        return view('admin.orders.single', compact('order'));
    }

    /**
     * Change Order Status
     */
    public function ChangeStatus(ChangeOrderStatusRequest $request)
    {
        $check_result = OrderService::CheckStatus($request->status);

        if ($check_result === false) {
            return redirect()
                ->back()
                ->with('fail_msg', config('shop.msg.fail_status_order'));
        }

        $changeOrder_result = OrderService::ChangeStatus($request->order, $request->status);

        if ($changeOrder_result === false) {
            return redirect()
                ->back()
                ->with('fail_msg', config('shop.msg.fail_update_order_status'));
        }

        return redirect()
            ->back()
            ->with('succ_msg', config('shop.msg.update'));

    }
}
