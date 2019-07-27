<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saleRequest extends FormRequest
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
            'saleName'=>'required',
            'salePrice'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'saleName.required' => 'Tên chương trình không được để trống',
            'salePrice.required' => 'giá sale không được để trống',

        ];
    }
}
