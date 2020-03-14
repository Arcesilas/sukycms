<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\AnimalRequest;
use App\Models\AnimalLocation;
use App\Models\AnimalSex;
use App\Models\AnimalSpecies;
use App\Models\AnimalStatus;
use App\Support\Forms\Fields\DateField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SelectField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Fields\TextareaField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class AnimalForm extends Form
{
    public string $formRequest = AnimalRequest::class;

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

            (new DateField('birth_date')),

            (new SelectField('urgent')),

            (new SelectField('special')),

            (new InputField('identifier')),

            (new InputField('microchip')),

            (new InputField('breed')),

            (new InputField('litter')),

            (new DateField('entry_date'))
                ->setValue(now()->format(option('date_format'))),

            (new TextareaField('description'))
                ->setShowLabel(false),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);

        if (empty($this->data)) {
            $this->add((new SelectField('location_id'))
                ->setLabel(__('forms.location'))
                ->setChoices($this->getLocations()));

            $this->add((new SelectField('status_id'))
                ->setLabel(__('forms.status'))
                ->setChoices($this->getStatuses()));
        }
    }

    private function getSpecies(): array
    {
        return AnimalSpecies::orderBy('order')->pluck('species', 'id')->toArray();
    }

    private function getSexes(): array
    {
        return AnimalSex::orderBy('order')->pluck('sex', 'id')->toArray();
    }

    private function getLocations(): array
    {
        return AnimalLocation::orderBy('order')->pluck('location', 'id')->toArray();
    }

    private function getStatuses(): array
    {
        return AnimalStatus::orderBy('order')->pluck('status', 'id')->toArray();
    }
}
