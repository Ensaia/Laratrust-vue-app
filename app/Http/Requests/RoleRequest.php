<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Role;
class RoleRequest extends FormRequest
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
        $role = new Role();
        return [
            'name' => ['required','unique:roles,name',Rule::unique('roles')->ignore($role)], //,'unique:roles'
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
            'name.required' => 'يرجى تعبئة الحقل الخاص باسم الدور',
            'display_name.required' => 'يرجى تعبئة الحقل الخاص بعنوان الدور',
            'description.required' => 'يرجى تعبئة الحقل الخاص بوصف الدور',
        ];
    }
}
