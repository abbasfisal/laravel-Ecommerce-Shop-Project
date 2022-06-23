<?php

namespace App\Http\Requests;

use App\Rules\CategoryExistenceRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryRequest extends FormRequest
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
            'id'       => 'required|exists:categories,id',
            'title'    => 'required|string|min:3',
            'slug'     => 'required|string|min:3',
            'category' => ['nullable', new CategoryExistenceRule()],
        ];
    }
}
