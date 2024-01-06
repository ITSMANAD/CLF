<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogPostRequest extends FormRequest
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
            'tags' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|int',
            'status' => 'required|int'
        ];
    }

    // در صورت نیاز، می‌توانید پیام‌های خطا را نیز تعریف کنید.
    public function messages()
    {
        return [
            'title.required' => 'عنوان الزامی است.',
            'text.required' => 'محتوا الزامی است.',
            'tags.required' => 'تگ ها الزامی است.',
            'description.required' => 'توضیحات کوتاه الزامی است.',
            'category.required' => 'انتخاب دسته بندی الزامی است.',
            'status.required' => 'انتخاب وضعیت انتشار الزامی است.',
            // ...
        ];
    }
}
