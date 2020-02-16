<?php

namespace App\Support\Crud\Fields;

class Custom extends Field
{
    public string $view;

    public function view(string $view): self
    {
        $this->view = $view;

        return $this;
    }

    public function make(string $key): self
    {
        $this->view = $key;
        parent::make($key);

        return $this;
    }
}
