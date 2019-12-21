<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class UserRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image',
            'notify' => [
                'boolean',
                Rule::in(array_keys(__('users.form.create.notify.choices'))),
            ]
        ];
    }
}
