<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopSettingsStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'currency' => 'required|string|max:255',
            'Seller' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'عنوان فاکتور الزامی است',
            'currency.required' => 'ارز پیش فرض الزامی است',
            'Seller.required' => 'نام فروشنده الزامی است',
        ];
    }
}
