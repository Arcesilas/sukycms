<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\AnimalSexRequest;
use App\Http\Requests\Admin\BehaviorRequest;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class BehaviorForm extends Form
{
    public string $formRequest = BehaviorRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.animals.behaviors.store');
            $submitLabel = __('forms.save');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.animals.behaviors.update', request()->route('behavior'));
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('behavior'))
                ->setRequired(true),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
