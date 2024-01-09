<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOTP extends FormRequest
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
            'one' => ['integer'],
            'two' => ['integer'],
            'three' => ['integer'],
            'four' => ['integer'],
        ];
    }
    public function messages()
    {
        return [
            'one.integer' => 'مقدار وارد شده حتما باید عدد باشد!',
            'two.integer' => 'مقدار وارد شده حتما باید عدد باشد!',
            'three.integer' => 'مقدار وارد شده حتما باید عدد باشد!',
            'four.integer' => 'مقدار وارد شده حتما باید عدد باشد!'
        ];
    }
}
