<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\isImage;
class addBookRequest extends FormRequest
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
            'author'=>'required',
//            'category'=>'required',
            'imageUpload'=>new isImage(),
        ];
    }
    public function messages()
    {
        return [
            'bookName.required' => 'Tên sách không được để trống',
            'author.required' => 'Tên tác giả không được để trống',
            'category.required' => 'Tên danh mục sách không được để trống',
        ];
    }
}
