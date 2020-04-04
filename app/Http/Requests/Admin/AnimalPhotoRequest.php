<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class AnimalPhotoRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'attachments[]' => 'array|file',
        ];
    }
}
