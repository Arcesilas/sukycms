<?php

namespace App\Support\Forms\Fields;

class SubmitField extends Field
{
    public string $class = 'btn btn-blue btn-loading';

    public string $icon = 'fas fa-save';

    public bool $wrapper = false;

    public function view(): string
    {
        return 'submit';
    }

    public function setIcon(string $icon = ''): self
    {
        $this->icon = $icon;

        return $this;
    }
}
