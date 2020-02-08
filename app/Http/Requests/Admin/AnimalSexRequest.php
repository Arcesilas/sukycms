<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnimalSexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sex' => [
                'required',
                Rule::unique('animal_sexes', 'sex')->ignore($this->route('sex'))
            ],
        ];
    }
}
