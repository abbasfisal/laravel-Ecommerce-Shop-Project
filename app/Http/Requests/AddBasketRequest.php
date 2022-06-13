<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddBasketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return mixed
     */
    public function authorize()
    {

        return Auth::check() ?  true : abort(403);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'product_id'=>'required|exists:products,id'
        ];
    }
}
