<?php

namespace App\Forms\Admin;

use App\Http\Requests\Admin\AnimalNoteRequest;
use App\Support\Forms\Fields\DateField;
use App\Support\Forms\Fields\FileField;
use App\Support\Forms\Fields\InputField;
use App\Support\Forms\Fields\SubmitField;
use App\Support\Forms\Fields\TextareaField;
use App\Support\Forms\Form;
use Illuminate\Http\Request;

class AnimalNoteForm extends Form
{
    public string $formRequest = AnimalNoteRequest::class;

    public function build(): void
    {
        if (empty($this->data)) {
            $this->url = route('admin.animals.notes.store', request()->route('animal'));
            $submitLabel = __('forms.save');
            $this->method = 'POST';
        } else {
            $this->url = route('admin.animals.notes.update', [
                request()->route('animal'),
                request()->route('note'),
            ]);
            $submitLabel = __('forms.save');
            $this->method = Request::METHOD_PUT;
        }

        $this->fields([
            (new InputField('title'))
                ->setRequired(true),

            (new DateField('date')),

            (new TextareaField('text'))
                ->setShowLabel(false),

            (new FileField('attachments[]'))
                ->setShowLabel(false)
                ->setMultiple(true),

            (new SubmitField('save'))
                ->setLabel($submitLabel),
        ]);
    }
}
