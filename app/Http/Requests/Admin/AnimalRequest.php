<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnimalRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:100',
            'sex_id' => 'required|exists:animal_sexes,id',
            'species_id' => 'required|exists:animal_species,id',
            'birth_date' => 'required|date_format:'.option('date_format'),
            'entry_date' => 'date_format:'.option('date_format'),
            'weight' => 'numeric',
            'height' => 'numeric',
            'length' => 'numeric',
            'litter' => 'max:200',
            'breed' => 'max:200',
            'microchip' => 'max:200',
            'description' => 'max:50000',
        ];

        if ($this->method() === Request::METHOD_PUT) {

        }

        return $rules;
    }
}
