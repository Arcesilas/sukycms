<?php

namespace App\Support\Forms\Fields;

class SelectField extends Field
{
    public array $choices = [];

    public string $selected = '';

    public function setSelected(string $selected): self
    {
        $this->selected = $selected;

        return $this;
    }

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
