<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            // Here we write the validation for form fields
            'name' => 'required|regex:/^[^<>]+$/u|unique:products,name|max:190',
            'price'  => 'numeric|min:0|regex:/^\d*(\.\d{1,2})?$/',
            'description'  => 'required|regex:/^[^<>]+$/u',
            'image'  => 'required|image|max:2000',
        ];
    }
}
