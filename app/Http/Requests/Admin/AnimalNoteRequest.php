<?php

namespace App\Http\Requests\Admin;

use App\Enum\Users\HealthType;
use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class AnimalNoteRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'max:150',
            'date' => 'required',
            'text' => 'max:50000',
        ];
    }
}
