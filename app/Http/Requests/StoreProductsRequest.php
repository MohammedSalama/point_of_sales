<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
            'name' => 'required|unique:products,name->ar,'.$this->id,
            'name_en' => 'required|unique:products,name->en,'.$this->id,
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('backend/products.This field is required'),
            'name_en.required' => trans('backend/products.This field is required')  ,
            'name.unique' => trans('backend/products.The product field in Arabic already exists'),
            'name_en.unique' => trans('backend/products.The product field in English already exists'),
            'category_id.required' => trans('backend/products.This field is required'),
        ];
    }
}