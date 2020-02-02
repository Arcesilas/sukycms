<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class ShelterRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'timezone' => 'required',
            'language' => 'required',
        ];
    }
}
