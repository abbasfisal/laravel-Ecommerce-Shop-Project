<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserOrderAddressRequest extends FormRequest
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

            "state"      => 'required|exists:states,id',
            "mobile"     => 'required|min:11|max:11|string', //TODO create rule for mobile
            "postalcode" => 'required',//TODO craete rule for postal code
            "address"    => 'required|string|min:4',
            "code"       => 'nullable'
        ];
    }
}
