<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppSettingFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'website_name' => [
                'required',
                'string'
            ],
            'website_link' => [
                'nullable',
                'string',
                'max:255'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,jpg,png,webp'
            ],
            'favicon' => [
                'nullable',
                'file',
                'mimes:jpeg,jpg,png,webp,ico'
            ],
            'copyright' => [
                'nullable',
                'string',
                'max:500'
            ],
            'email1' => [
                'nullable',
                'email',
                'max:255'
            ],
            'email2' => [
                'nullable',
                'email',
                'max:255'
            ],
            'fax' => [
                'nullable',
                'string',
                'max:100'
            ],
            'phone1' => [
                'nullable',
                'string',
                'max:255'
            ],
            'phone2' => [
                'nullable',
                'string',
                'max:255'
            ],
            'whatsapp' => [
                'nullable',
                'string',
                'max:191'
            ],
            'address' => [
                'nullable',
                'string'
            ]
        ];

        return $rules;
    }
}
