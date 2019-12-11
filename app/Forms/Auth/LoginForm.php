<?php

namespace App\Forms\Auth;

use App\Support\Forms\Fields\EmailField;
use App\Support\Forms\Fields\PasswordField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;

class LoginForm extends Form
{
    public function build(): void
    {
        $this->fields([
            new EmailField('email'),
            new PasswordField('password'),
            new SubmitField('login'),
        ]);
    }
}
