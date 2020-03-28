<?php

namespace App\Support\Forms\Fields;

class SelectField extends Field
{
    public array $choices = [
        0 => 'No',
        1 => 'Yes',
    ];

    public string $selected = '';

    public bool $emptyOption = false;

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

    public function setEmptyOption(bool $emptyOption): self
    {
        $this->emptyOption = $emptyOption;

        return $this;
    }

    public function view(): string
    {
        return 'select';
    }
}
