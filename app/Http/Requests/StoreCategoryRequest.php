<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'editor1' => 'required|string',
            'slug' => 'required|string|unique:categories,slug',

        ];
    }

    // در صورت نیاز، می‌توانید پیام‌های خطا را نیز تعریف کنید.
    public function messages()
    {
        return [
            'name.required' => 'عنوان الزامی است.',
            'editor1.required' => 'توضیحات الزامی است.',
            'slug.required' => 'آدرس نوشته الزامی است.',
            'status.required' => 'انتخاب وضعیت انتشار الزامی است.',
            'slug.unique' => 'آدرس انتخاب شده از قبل وجود دارد!',
            // ...
        ];
    }
}
