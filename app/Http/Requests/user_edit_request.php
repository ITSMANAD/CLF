<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class user_edit_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'max:255'],
            'isAdmin' => ['int', 'max:2'],
            'id' => ['int', 'max:11'],
            'address' => ['string', 'max:255'],
            'postalcode' => ['string', 'max:255'],
            'phone' => ['int', 'max:12'],

        ];
    }
}
