<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\ColorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * return  all data to view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $colors = ColorService::getWithPaginate();
        return view('admin.colors.index', compact('colors'));
    }

    /**
     * store new color into db
     * @param StoreColorRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreColorRequest $request)
    {
        ColorService::create($request);
        return redirect(route('index.color'))->with('success', msg_succ());
    }

    public function ShowEdit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function Update(UpdateColorRequest $request)
    {
        $update_result = ColorService::update($request->id, $request->name, $request->code);

        if ($update_result === false)
            return redirect()
                ->back()
                ->with('fail', config('shop.msg.fail_update'));

        return redirect()
            ->back()
            ->with('success', config('shop.msg.update'));
    }

}
