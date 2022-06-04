<?php

namespace App\Http\Requests;

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
            "category_id"       => "required|exists:categories,id",
            "brand_id"          => "required|exists:brands,id",
            "price"             => 'required|integer',
            "on_sale"           => 'nullable|integer',
            "stock"             => 'required|integer',
            "started_at"        => 'nullable|date',
            "end_at"            => 'nullable|date|after_or_equal:started_at',
            "image"             => 'required|mimes:jpg,jpeg,png',
            "note"              => 'nullable|string|min:4',
            "short_description" => 'required|min:4|string',
            "long_description"  => 'nullable|min:4|string',
        ];
    }
}
