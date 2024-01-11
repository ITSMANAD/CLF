<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategory extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'category' => 'required|int',
            'editor1' => 'required|string',
            'slug' => 'required|string|unique:sub_categories,slug',

        ];
    }

    // در صورت نیاز، می‌توانید پیام‌های خطا را نیز تعریف کنید.
    public function messages()
    {
        return [
            'name.required' => 'عنوان الزامی است.',
            'category.required' => 'دسته بندی مادر الزامی است.',
            'editor1.required' => 'توضیحات الزامی است.',
            'slug.required' => 'آدرس زیر دسته بندی الزامی است.',
            'status.required' => 'انتخاب وضعیت انتشار الزامی است.',
            'slug.unique' => 'آدرس انتخاب شده از قبل وجود دارد!',
            // ...
        ];
    }
}
