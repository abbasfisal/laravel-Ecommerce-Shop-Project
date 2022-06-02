<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Service\SizeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSizeRequest;

class SizeController extends Controller
{
    /**
     * return data with pagination to view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sizes = SizeService::getWithPagination();
        return view('admin.sizes.index', compact('sizes'));
    }

    /**
     * store new size to db
     * @param StoreSizeRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreSizeRequest $request)
    {
        SizeService::create($request);
        return redirect(route('index.size'))->with('success', msg_succ());
    }
}
