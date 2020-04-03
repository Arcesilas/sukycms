<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\AnimalHealthRequest;
use App\Support\Forms\Fields\DateTimeField;
use App\Support\Forms\Fields\FileField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\NumberField;
use App\Support\Forms\Fields\SelectField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Fields\TextareaField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class AnimalHealthForm extends Form
{
    public string $formRequest = AnimalHealthRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.animals.health.store', request()->route('animal'));
            $submitLabel = __('forms.save');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.animals.health.update', [
                request()->route('animal'),
                request()->route('health')
            ]);
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('title'))
                ->setRequired(true),

            (new DateTimeField('start_date')),

            (new DateTimeField('end_date')),

            (new InputField('medicine')),

            (new SelectField('type'))
                ->setEmptyOption(true)
                ->setClass('select-toggle')
                ->setChoices(__('animals.health.type')),

            (new TextareaField('text'))
                ->setShowLabel(false),

            (new FileField('attachments[]'))
                ->setShowLabel(false)
                ->setMultiple(true),

            (new SubmitField('save'))
                ->setLabel($submitLabel),

            // TREATMENT
            (new NumberField('treatments_number')),

            (new NumberField('treatments_each')),

            (new SelectField('treatments_time'))
                ->setChoices(__('animals.health.treatments_time')),

            (new SelectField('treatments_life'))
                ->setChoices(__('forms.boolean')),

            // TEST
            (new InputField('test')),

            (new InputField('test_result')),

            // VACCINE
            (new InputField('vaccine')),

            // DISEASE
            (new InputField('disease')),
        ]);
    }
}
