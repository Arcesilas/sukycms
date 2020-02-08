<?php

namespace App\Support\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

trait Crud
{
    public function __construct()
    {
        view()->share('viewNamespace', $this->viewNamespace);
        view()->share('routeNamespace', $this->routeNamespace);
        view()->share('transNamespace', $this->transNamespace);

        parent::__construct();
    }

    public function index(): View
    {
        return view('admin.layouts.crud.index', [
            'tableFields' => $this->tableFields(),
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

        $this->model()->forceCreate($validation->validated());

        flash(
            __($this->transNamespace.'.create.title'),
            __($this->transNamespace.'.create.text'),
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
            __($this->transNamespace.'.update.title'),
            __($this->transNamespace.'.update.text'),
        )->show();

        return redirect()->route($this->routeNamespace.'.edit', $model);
    }

    public function delete(Model $model): RedirectResponse
    {
        $model->delete();

        flash(
            __($this->transNamespace.'.delete.title'),
            __($this->transNamespace.'.delete.text'),
        )->show();

        return redirect()->route($this->routeNamespace.'.index');
    }
}
