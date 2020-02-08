<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\AnimalSexRequest;
use App\Http\Requests\Admin\AnimalSpeciesRequest;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class AnimalSpeciesForm extends Form
{
    public string $formRequest = AnimalSpeciesRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.animals.species.store');
            $submitLabel = __('forms.save');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.animals.species.update', request()->route('species'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('species'))
                ->setRequired(true),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
