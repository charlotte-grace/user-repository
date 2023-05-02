<?php

namespace app\Lib\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserListingRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'personal.first_name' => 'required|string|max:255',
            'personal.last_name' => 'required|string|max:255',
            'personal.email_address' => 'required|string|email|max:255|unique:employees,email_address',
            'personal.position' => 'required|string',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'personal.first_name.required' => 'First Name required',
            'personal.last_name.required' => 'Last Name required',
            'personal.email_address.required' => 'Email required',
            'personal.email_address.email' => 'Email invalid',
            'personal.email_address.unique' => 'Email already already exists',
            'personal.position.required' => 'Please enter your current position',
        ];
    }
}
