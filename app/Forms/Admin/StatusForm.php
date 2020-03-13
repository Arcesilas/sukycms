<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\StatusRequest;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class StatusForm extends Form
{
    public string $formRequest = StatusRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.animals.statuses.store');
            $submitLabel = __('forms.save');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.animals.statuses.update', request()->route('status'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('status'))
                ->setRequired(true),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
