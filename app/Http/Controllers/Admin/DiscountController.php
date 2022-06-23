<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\DiscountService;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = DiscountService::getWithPagination();
        return view('admin.discounts.index', compact('discounts'));
    }

    public function store(storeDiscountRequest $request)
    {
        DiscountService::create($request);

        return redirect(route('index.discount'))->with('success', msg_succ());

    }


    public function ShowEdit(Discount $discount)
    {
        return view('admin.discounts.edit', compact('discount'));
    }

    public function Update(UpdateDiscountRequest $request)
    {
        $discount_update_result =DiscountService::Update($request);

        if ($discount_update_result === false)
            return redirect()
                ->back()
                ->with('fail', config('fail', 'fail_update'));

        return redirect(route('index.discount'));

    }
}
