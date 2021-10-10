<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriesRequest extends FormRequest
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

            'name' => 'required|unique:categories,name->ar,'.$this->id,
            'name_en' => 'required|unique:categories,name->en,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>   trans('backend/categories.Please enter the section name in Arabic') ,
            'name_en.required' =>  trans('backend/categories.Please enter the section name in English'),
        ];
    }
}
