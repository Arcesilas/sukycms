<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Support\Forms\Fields\CheckboxField;
use App\Support\Forms\Fields\EmailField;
use App\Support\Forms\Fields\FileField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\PasswordField;
use App\Support\Forms\Fields\SelectField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class UserForm extends Form
{
    public string $formRequest = UserRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.users.store');
            $submitLabel = __('users.create.submit');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.users.update', request()->route('user'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('name'))
                ->setRequired(true),

            (new EmailField('email'))
                ->setRequired(true),

            (new SelectField('role'))
                ->setChoices(__('users.roles')),

            (new SelectField('status'))
                ->setChoices(__('users.statuses')),

            (new PasswordField('password')),
            (new PasswordField('password_confirmation')),

            (new FileField('avatar'))
                ->setShowLabel(false),

            (new SelectField('notify'))
                ->setChoices(__('users.create.notify.choices'))->setShowLabel(false),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
