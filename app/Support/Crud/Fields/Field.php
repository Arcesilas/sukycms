<?php

namespace App\Support\Crud\Fields;

abstract class Field
{
    public string $key;

    public string $title;

    public string $align = 'left';

    public function make(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function align(string $align): self
    {
        $this->align = $align;

        return $this;
    }
}
