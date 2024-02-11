<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'required|file',
            'slug' => 'required|string|unique:brands,slug',
            'text' => 'required|text',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'نام الزامی است.',
            'text.required' => 'محتوا الزامی است.',
            'slug.required' => 'آدرس برند الزامی است.',
            'image.required' => 'انتخاب تصویر نمایه الزامی است.',
            'slug.unique' => 'آدرس انتخاب شده از قبل وجود دارد!',
        ];
    }
}
