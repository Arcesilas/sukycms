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
            'title' => 'max:150',
            'start_date' => 'required',
            'end_date' => '',
            'text' => 'max:50000',

            // Vaccine
            'vaccine' => 'required_if:type,vaccine',

            // Treatment
            'treatments_number' => 'required_if:type,treatment|required_if:type,disease',
            'treatments_each' => 'required_if:type,treatment|required_if:type,disease',
            'treatments_time' => 'required_if:type,treatment|required_if:type,disease',
            'treatments_life' => 'required_if:type,treatment|required_if:type,disease',

            // Disease
            'disease' => 'required_if:type,disease',
            'medicine' => '',
        ];
    }
}
