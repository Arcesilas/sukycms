<?php

namespace App\Forms\Auth;

use App\Support\Forms\Fields\CheckboxField;
use App\Support\Forms\Fields\EmailField;
use App\Support\Forms\Fields\PasswordField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class LoginForm extends Form
{
    public function build(): void
    {
        $this->method = Request::METHOD_POST;
        $this->url = route('auth.login');

        $this->fields([
            new EmailField('email'),
            new PasswordField('password'),
            (new SubmitField('login'))
                ->setClass('btn btn-blue'),
            new CheckboxField('remember'),
        ]);
    }
}
