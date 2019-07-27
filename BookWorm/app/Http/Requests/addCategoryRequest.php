<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCategoryRequest extends FormRequest
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
            'name'=>'required',
            'logo'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên thể loại không được trống',
            'logo.required' => 'logo không được để trống',

        ];
    }
}
