<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopSetupRequest extends FormRequest
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
            "sitename" => "string|required",
            "sitedesceiption" => "string|required",
            "sitelogo" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "shoptype" => "string|required",
            "sitesubject" => "string|required",
        ];
    }
    public function messages()
    {
        return [
            "sitename.required" => "نام سایت الزامی است!",
            "sitedesceiption.required" => "توضیحات سایت الزامی است!",
            "sitelogo.required" => "لوگو سایت الزامی است!",
            "sitelogo.mimes" => "فرمت ارسالی قابل قبول نیست!",
            "sitelogo.image" => "فایل ارسالی عکس نیست!",
            "shoptype.required" => "کاربری سایت الزامی است!",
            "sitesubject.required" => "موضوع فروشگاه الزامی است!",
        ];
    }
}
