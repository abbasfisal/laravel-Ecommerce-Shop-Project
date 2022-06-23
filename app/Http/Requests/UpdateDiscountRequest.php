<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'required|exists:discounts,id' ,
            'title'      => 'required|string|min:4',
            'percent'    => 'required|integer|between:0,100',
            'started_at' => 'required|date',
            'end_at'     => 'required|date|after_or_equal:started_at',
            'image'      => 'nullable|mimes:jpg,jpeg,png'
        ];
    }
}
