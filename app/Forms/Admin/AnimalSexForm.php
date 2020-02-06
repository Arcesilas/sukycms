<?php

namespace App\Forms\Admin;

use App\Models\AnimalLocation;
use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use App\Support\Forms\Fields\CheckboxField;
use App\Support\Forms\Fields\DateField;
use App\Support\Forms\Fields\FileField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SelectField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Fields\TextareaField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class AnimalSexForm extends Form
{
    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.animals.sexes.store');
            $submitLabel = __('forms.save');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.animals.sexes.update', request()->route('animalsex'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('sex'))
                ->setRequired(true),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
