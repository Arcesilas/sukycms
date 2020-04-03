<?php

namespace App\Support\Forms\Fields;

class FileField extends Field
{
    public bool $multiple = false;

    public function view(): string
    {
        return 'file';
    }

    public function setMultiple(string $multiple): self
    {
        $this->multiple = $multiple;

        return $this;
    }
}
