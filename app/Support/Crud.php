<?php

namespace App\Support;

use App\Http\Requests\AnimalSexRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

trait Crud
{
    public function __construct()
    {
        view()->share('namespace', $this->viewNamespace);
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
        app($this->formRequest());

        flash(
            __(''),
            __(''),
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
}
