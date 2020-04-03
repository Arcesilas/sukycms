<?php

namespace App\Http\Requests\Admin;

use App\Enum\Users\HealthType;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

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
            'type' => [
                'required',
                Rule::in(HealthType::getValues())
            ],

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
