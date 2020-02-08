<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BehaviorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'behavior' => [
                'required',
                Rule::unique('behaviors', 'behavior')->ignore($this->route('behavior'))
            ],
        ];
    }
}
