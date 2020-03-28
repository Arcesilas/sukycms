<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnimalHealthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            // Vaccine
            'vaccine' => 'required_if:type,vaccine',

            // Treatment
            'treatments_number' => 'required_if:type,treatment',
            'treatments_each' => 'required_if:type,treatment',
            'treatments_time' => 'required_if:type,treatment',
            'treatments_life' => 'required_if:type,treatment',
        ];
    }
}
