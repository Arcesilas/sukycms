<?php

namespace App\Support\Forms\Fields;

use Illuminate\Support\Str;

abstract class Field
{
    public string $name;

    public string $label;

    public string $id;

    public string $value = '';

    public string $class = '';

    public array $options = [];

    public bool $wrapper = true;

    public bool $show_label = true;

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

    public function setWrapper(bool $wrapper): self
    {
        $this->wrapper = $wrapper;

        return $this;
    }

    public function setShowLabel(bool $show_label): self
    {
        $this->show_label = $show_label;

        return $this;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function render(): string
    {
        return view("components.forms.fields.{$this->view()}", [
            'field' => $this,
        ])->toHtml();
    }
}
