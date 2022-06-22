<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\SizeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Size;

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

    public function ShowEdit(Size $size)
    {
        return view('admin.sizes.edit', compact('size'));
    }

    /**
     * Update Size
     */
    public function Update(UpdateSizeRequest $request)
    {
        $update_result = SizeService::update($request->id, $request->title);

        if ($update_result === false)
            return redirect()
                ->back()
                ->with('fail', config('shop.msg.fail_update'));


        return redirect()
            ->back()
            ->with('success', config('shop.msg.update'));
    }
}
