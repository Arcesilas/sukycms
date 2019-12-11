<?php

namespace App\Support\Forms\Fields;

use Illuminate\Support\Str;

abstract class Field
{
    public string $name;

    public string $label;

    public string $id;

    public array $options = [];

    abstract public function view(): string;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->label = __("forms.{$name}");
        $this->id = sprintf('%s-%s', Str::random(8), $name);
    }

    public function setRequired(bool $required): self
    {
        $this->options['required'] = $required;

        return $this;
    }

    public function setDisabled(bool $disabled): self
    {
        $this->options['disabled'] = $disabled;

        return $this;
    }

    public function setReadonly(bool $readonly): self
    {
        $this->options['readonly'] = $readonly;

        return $this;
    }

    public function render(): string
    {
        return view("components.forms.fields.{$this->view()}", [
            'field' => $this,
        ])->toHtml();
    }
}
