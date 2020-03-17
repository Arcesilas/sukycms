<?php

namespace App\Forms\Admin;

use App\Support\Forms\Fields\EmailField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SelectField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Fields\TextareaField;
use App\Support\Forms\Form;
use App\Support\Timezone;
use Illuminate\Http\Request;

class ShelterForm extends Form
{
    public function build(): void
    {
        $this->method = Request::METHOD_PUT;
        $this->url = route('admin.shelter.update');

        $this->fields([
            (new InputField('name'))
                ->setRequired(true),

            (new EmailField('email'))
                ->setRequired(true),

            (new TextareaField('description'))
                ->setRequired(true),

            (new InputField('address'))
                ->setRequired(false),

            (new InputField('postal_code'))
                ->setRequired(false),

            (new InputField('city'))
                ->setRequired(false),

            (new InputField('country'))
                ->setRequired(false),

            new SubmitField('save'),
        ]);
    }
}
