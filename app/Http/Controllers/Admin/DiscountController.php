<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function index()
    {
        return view('admin.discounts.index');
    }
}
