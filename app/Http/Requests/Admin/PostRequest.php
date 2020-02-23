<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class PostRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:150',
            'published_at' => 'required|date',
            'category_id' => 'required|exists:posts_categories,id',
            'content' => 'required|max:50000',
        ];
    }
}
