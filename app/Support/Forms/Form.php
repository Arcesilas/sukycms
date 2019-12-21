<?php

namespace App\Support\Forms;

use App\Support\Forms\Fields\Field;
use App\Support\Forms\Fields\InputField;
use Illuminate\Http\Request;
use RuntimeException;

abstract class Form
{
    public string $method = 'GET';

    public string $url = '';

    public array $fields = [];

    public array $data = [];

    abstract public function build(): void;

    public function make(): self
    {
        $this->build();

        return $this;
    }

    public function render()
    {
        return view('components.forms.form', [
            'form' => $this,
        ]);
    }

    public function renderField(string $name, array $options = [])
    {
        $field = $this->fields[$name];

        if (isset($options['wrapper'])) {
            $field->setWrapper($options['wrapper']);
        }

        if (isset($options['show_label'])) {
            $field->setShowLabel($options['show_label']);
        }

        return $field->render();
    }

    public function renderStart(): string
    {
        $methodField = false;
        if (! in_array($this->method, [Request::METHOD_GET, Request::METHOD_POST], true)) {
            $methodField = $this->method;
            $this->method = 'POST';
        }

        $form = "<form action='{$this->url}' method='{$this->method}' enctype=\"multipart/form-data\">";
        $form .= csrf_field();

        if ($methodField) {
            $form .= method_field($methodField);
        }

        return $form;
    }

    public function renderEnd(): string
    {
        return '</form>';
    }

    public function add(Field $field): self
    {
        if (isset($this->fields[$field->name])) {
            throw new RuntimeException("Field {$field->name} already exists");
        }

        if (isset($this->data[$field->name])) {
            $field->value = $this->data[$field->name];
        }

        $this->fields[$field->name] = $field;

        return $this;
    }

    public function fields(array $fields): self
    {
        foreach ($fields as $field) {
            $this->add($field);
        }

        return $this;
    }

    public function setData(array $data = []): self
    {
        $this->data = $data;

        return $this;
    }
}
