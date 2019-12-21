<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->route('user'))
            ],
            'password' => '',
            'password_confirmation' => 'required_if:password,confirmation',
        ];
    }
}
