<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class PageRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:150',
            'published_at' => 'required|date',
            'content' => 'required|max:50000',
        ];
    }
}
