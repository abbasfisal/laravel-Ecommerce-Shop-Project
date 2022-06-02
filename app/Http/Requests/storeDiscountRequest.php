<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeDiscountRequest extends FormRequest
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
            'title'      => 'required|string|min:4',
            'percent'    => 'required|integer|between:0,100',
            'started_at' => 'required|date',
            'end_at'     => 'required|date|after_or_equal:started_at',
            'image'      => 'nullable|mimes:jpg,jpeg,png'
        ];
    }
}


