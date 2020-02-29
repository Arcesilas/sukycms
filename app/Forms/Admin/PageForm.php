<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\PageRequest;
use App\Support\Forms\Fields\DateTimeField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Fields\TextareaField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class PageForm extends Form
{
    public string $formRequest = PageRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.pages.store');
            $submitLabel = __('pages.form.create.submit');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.pages.update', request()->route('page'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('title'))
                ->setRequired(true),

            (new DateTimeField('published_at'))
                ->setRequired(true),

            (new TextareaField('content'))
                ->setShowLabel(false),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
