<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtpCheckRequest extends FormRequest
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

            'first'  => 'required|max:9|int',
            'second' => 'required|max:9|int',
            'third'  => 'required|max:9|int',
            'fourth' => 'required|max:9|int',


        ];
    }
}
