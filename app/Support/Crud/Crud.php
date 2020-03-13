<?php

namespace App\Support\Crud;

use App\Support\Forms\Form;
use App\Support\Orderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
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
        return view('admin.layouts.crud.index', array_merge([
            'fields' => $this->fields(),
            'items' => $this->indexQuery(),
        ], $this->viewShare()));
    }

    public function create(): View
    {
        return view('admin.layouts.crud.create', array_merge([
            'form' => $this->form()->make(),
        ], $this->formViewShare()));
    }

    public function store(): RedirectResponse
    {
        $validation = app($this->formRequest());

        $model = (new $this->model)->forceCreate($validation->validated());

        activityLog()->onModel($model)->log();

        flash(
            __($this->transNamespace.'.create.success'),
        )->show();

        return redirect()->route($this->routeNamespace.'.index');
    }

    public function edit(Model $model): View
    {
        return view('admin.layouts.crud.edit', array_merge([
            'form' => $this->form()->setData($model)->make(),
            'model' => $model,
        ], $this->formViewShare()));
    }

    public function update(Model $model): RedirectResponse
    {
        $validation = app($this->formRequest());

        foreach ($validation->validated() as $key => $value) {
            $model->$key = $value;
        }

        $oldAttributes = Arr::only($model->getOriginal(), array_keys($model->getDirty()));
        $model->save();
        $model->oldAttributes = $oldAttributes;

        activityLog()->onModel($model)->log();

        flash(
            __($this->transNamespace.'.edit.success'),
        )->show();

        return redirect()->route($this->routeNamespace.'.edit', $model);
    }

    public function destroy(Model $model): RedirectResponse
    {
        if (! $this->preDestroy($model)) {
            return redirect()->route($this->routeNamespace.'.index');
        }

        if (in_array(DontDestroyLast::class, class_uses($this)) && ! $this->dontDestroyLast($model)) {
            return redirect()->route($this->routeNamespace.'.index');
        }

        $model->delete();

        if (in_array(Orderable::class, class_uses($this))) {
            (new $model)->where('order', '>', $model->order)->decrement('order');
        }

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

    public function viewShare(): array
    {
        return [];
    }

    public function formViewShare(): array
    {
        return [];
    }

    public function preDestroy(): bool
    {
        return true;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }
}
