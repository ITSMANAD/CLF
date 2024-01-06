<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:11', 'unique:'.User::class],
            'address' => ['required', 'string'],
            'postalcode' => ['required', 'string', 'max:11'],
            'password' => ['required', Password::defaults()],
        ];
    }

    // در صورت نیاز، می‌توانید پیام‌های خطا را نیز تعریف کنید.
    public function messages()
    {
        return [
            'name.required' => 'نام و نام خانوادگی الزامی است.',
            'email.required' => 'ایمیل الزامی است.',
            'email.unique' => 'ایمیل از قبل وجود دارد!',
            'phone.required' => 'شماره همراه الزامی است.',
            'address.required' => 'آدرس دقیق الزامی است.',
            'phone.unique' => 'شماره همراه وارد شده از قبل وجود دارد!',
            'postalcode.required' => 'کد پستی الزامی است.',
            // ...
        ];
    }
}
