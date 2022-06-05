<?php

namespace App\Http\Requests;

use App\Rules\ColorRule;
use App\Rules\SizeRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        return [
            "title"             => 'required|min:4',
            "slug"              => 'required|min:4',

            'sizes'             => 'nullable',
            'sizes.*'           => [new SizeRule()],
            'colors'            => 'nullable',
            'colors.*'          => [new ColorRule()],


            "main_category"     => "required|exists:categories,id",
            "category_id"       => "required|exists:categories,id",//sub cateogry
            "brand_id"          => "required|exists:brands,id",

            "price"             => 'required|integer',
            "on_sale"           => 'nullable|integer',

            "stock"             => 'required|integer',

            "started_at"        => 'nullable|date', //start day for takhfif
            "end_at"            => 'nullable|date|after_or_equal:started_at',//end day for takhfif

            "cover"             => 'required|mimes:jpg,jpeg,png',
            'galleries'         => 'nullable', //for gallery
            'galleries.*'       => 'mimes:jpg,jpeg,png', //for gallery


            "note"              => 'nullable|string|min:4',
            "short_description" => 'required|min:4|string',
            "long_description"  => 'nullable|min:4|string',
        ];
    }
}
