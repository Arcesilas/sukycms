<?php

namespace App\Forms\Admin;

use App\Models\AnimalLocation;
use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use App\Support\Forms\Fields\CheckboxField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SelectField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Fields\TextareaField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class AnimalForm extends Form
{
    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.animals.store');
            $submitLabel = __('animals.form.create.submit');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.animals.update', request()->route('animal'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('name'))
                ->setRequired(true),

            (new SelectField('species_id'))
                ->setLabel(__('forms.species'))
                ->setChoices($this->getSpecies()),

            (new SelectField('sex_id'))
                ->setLabel(__('forms.sex'))
                ->setChoices($this->getSexes()),

            (new SelectField('location_id'))
                ->setLabel(__('forms.location'))
                ->setChoices($this->getLocations()),

            (new InputField('birth_date')),

            (new SelectField('urgent')),

            (new SelectField('special')),

            (new InputField('entry_date')),

            (new TextareaField('description'))
                ->setShowLabel(false),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }

    private function getSpecies(): array
    {
        return AnimalSpecies::pluck('species', 'id')->toArray();
    }

    private function getSexes(): array
    {
        return AnimalSex::pluck('sex', 'id')->toArray();
    }

    private function getLocations(): array
    {
        return AnimalLocation::pluck('location', 'id')->toArray();
    }
}
