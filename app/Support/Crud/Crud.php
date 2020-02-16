<?php

namespace App\Support\Crud;

use App\Support\Forms\Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

trait Crud
{
    protected string $viewNamespace;

    protected string $routeNamespace;

    protected string $transNamespace;

    public function __construct()
    {
        $this->setNamespaces();

        parent::__construct();
    }

    public function index(): View
    {
        return view('admin.layouts.crud.index', [
            'fields' => $this->fields(),
            'items' => $this->indexQuery(),
        ]);
    }

    public function create(): View
    {
        return view('admin.layouts.crud.create', [
            'form' => $this->form()->make(),
        ]);
    }

    public function store(): RedirectResponse
    {
        $validation = app($this->formRequest());

        (new $this->model)->forceCreate($validation->validated());

        flash(
            __($this->transNamespace.'.create.success'),
        )->show();

        return redirect()->route($this->routeNamespace.'.index');
    }

    public function edit(Model $model): View
    {
        return view('admin.layouts.crud.edit', [
            'form' => $this->form()->setData($model)->make(),
            'model' => $model,
        ]);
    }

    public function update(Model $model): RedirectResponse
    {
        $validation = app($this->formRequest());

        foreach ($validation->validated() as $key => $value) {
            $model->$key = $value;
        }

        $model->save();

        flash(
            __($this->transNamespace.'.edit.success'),
        )->show();

        return redirect()->route($this->routeNamespace.'.edit', $model);
    }

    public function destroy(Model $model): RedirectResponse
    {
        $model->delete();

        flash(
            __($this->transNamespace.'.destroy.success'),
        )->show();

        return redirect()->route($this->routeNamespace.'.index');
    }

    public function model(): Model
    {
        return new $this->model;
    }

    public function form(): Form
    {
        $form = $this->model()->form;

        return new $form;
    }

    public function formRequest(): string
    {
        return $this->form()->formRequest;
    }

    public function setNamespaces(): void
    {
        $this->viewNamespace = 'admin.'.$this->namespace;
        $this->routeNamespace = 'admin.'.$this->namespace;
        $this->transNamespace = $this->namespace;

        view()->share('viewNamespace', $this->viewNamespace);
        view()->share('routeNamespace', $this->routeNamespace);
        view()->share('transNamespace', $this->namespace);
    }
}
