<?php

namespace App\Forms\Admin;

use App\Support\Forms\Fields\CheckboxField;
use App\Support\Forms\Fields\EmailField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\PasswordField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class ShelterForm extends Form
{
    public function build(): void
    {
        $this->method = Request::METHOD_POST;
        $this->url = route('admin.shelter.update');

        $this->fields([
            new InputField('name'),
            new InputField('domain'),
            (new InputField('subdomain'))
                ->setHelpText('Test'),
            new EmailField('email'),
        ]);
    }
}
