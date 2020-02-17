<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|max:30',
            'avatar' => 'nullable|image',
        ];

        if ($this->method() === Request::METHOD_POST) {
            $rules['notify'] = [
                'boolean',
                Rule::in(array_keys(__('users.create.notify.choices'))),
            ];
        }

        if ($this->method() === Request::METHOD_PUT) {
            $rules['email'] = [
                'email',
                'required',
                Rule::unique('users')->ignore($this->route('user')->id),
            ];

            $rules['password'] = 'confirmed';
        }

        return $rules;
    }
}
