<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AnimalHealthRequest extends BaseRequest
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
            'treatments_number' => '',
            'treatments_each' => '',
            'treatments_time' => '',
            'treatments_life' => '',

            // Disease
            'disease' => 'required_if:type,disease',
            'medicine' => 'required_if:type,treatment|required_if:type,disease',
        ];
    }
}
