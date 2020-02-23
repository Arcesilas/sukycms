<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\PostRequest;
use App\Models\PostCategory;
use App\Support\Forms\Fields\DateField;
use App\Support\Forms\Fields\EmailField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SelectField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Fields\TextareaField;
use App\Support\Forms\Form;
use App\Support\Timezone;
use Illuminate\Http\Request;

class PostForm extends Form
{
    public string $formRequest = PostRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.posts.store');
            $submitLabel = __('posts.form.create.submit');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.posts.update', request()->route('post'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('title'))
                ->setRequired(true),

            (new DateField('published_at'))
                ->setRequired(true),

            (new SelectField('category_id'))
                ->setChoices(PostCategory::pluck('title', 'id')->toArray()),

            (new TextareaField('content'))
                ->setShowLabel(false),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
