<?php

namespace App\Support\Forms\Fields;

class SelectField extends Field
{
    public array $choices = [];

    public function setChoices(array $choices): self
    {
        $this->choices = $choices;

        return $this;
    }

    public function view(): string
    {
        return 'select';
    }
}
