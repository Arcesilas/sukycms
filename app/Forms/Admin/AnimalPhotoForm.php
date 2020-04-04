<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\AnimalPhotoRequest;
use App\Support\Forms\Fields\FileField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Form;

class AnimalPhotoForm extends Form
{
    public string $formRequest = AnimalPhotoRequest::class;

    public function build(): void
    {
        $this->method = 'POST';

        $this->fields([
            (new FileField('photos[]'))
                ->setShowLabel(false)
                ->setMultiple(true),

            (new SubmitField('save')),
        ]);
    }
}
