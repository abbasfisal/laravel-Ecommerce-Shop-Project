<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\DiscountService;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeDiscountRequest;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = DiscountService::getWithPagination();
        return view('admin.discounts.index'  ,compact('discounts'));
    }

    public function store(storeDiscountRequest $request)
    {
        DiscountService::create($request);

        return redirect(route('index.discount'))->with('success', msg_succ());

    }
}
