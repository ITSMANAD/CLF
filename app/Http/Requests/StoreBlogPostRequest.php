<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'slug' => 'required|string|unique:blog_posts,slug',
            'tags' => 'required|string',
            'category' => 'required|string',
            'thumbnail' => 'required|file',
        ];
    }

    // در صورت نیاز، می‌توانید پیام‌های خطا را نیز تعریف کنید.
    public function messages()
    {
        return [
            'title.required' => 'عنوان الزامی است.',
            'text.required' => 'محتوا الزامی است.',
            'slug.required' => 'آدرس نوشته الزامی است.',
            'tags.required' => 'تگ ها الزامی است.',
            'category.required' => 'انتخاب دسته بندی الزامی است.',
            'thumbnail.required' => 'انتخاب تصویر نمایه الزامی است.',
            // ...
        ];
    }
}
