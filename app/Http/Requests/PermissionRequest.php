<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        return [
            'name' => ['required'], // ,'unique:permissions'
            'display_name' => ['required'],
            'description' => ['required'],
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'يرجى تعبئة الحقل الخاص باسم اﻹذن',
            'display_name.required' => 'يرجى تعبئة الحقل الخاص بعنوان اﻹذن',
            'description.required' => 'يرجى تعبئة الحقل الخاص بوصف اﻹذن',
        ];
    }
}