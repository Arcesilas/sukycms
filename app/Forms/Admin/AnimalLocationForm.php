<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\AnimalLocationRequest;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class AnimalLocationForm extends Form
{
    public string $formRequest = AnimalLocationRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.animals.locations.store');
            $submitLabel = __('forms.save');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.animals.locations.update', request()->route('location'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('location'))
                ->setRequired(true),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
