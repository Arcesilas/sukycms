<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\AnimalSexForm;
use App\Http\Requests\AnimalSexRequest;
use App\Models\AnimalSex;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnimalSexController extends AdminBaseController
{
    public function index(): View
    {
        return view('admin.animals.sexes.index', [
            'sexes' => AnimalSex::withCount('animals')->get(),
        ]);
    }

    public function create(AnimalSexForm $form): View
    {
        return view('admin.animals.sexes.create', [
            'form' => $form->make(),
        ]);
    }

    public function store(AnimalSexRequest $request): RedirectResponse
    {
        flash(
            __(''),
            __(''),
        )->show();

        return redirect()->route('admin.animals.sexes.index');
    }

    public function edit(AnimalSexForm $form, AnimalSex $sex): View
    {
        return view('admin.animals.sexes.edit', [
            'form' => $form->setData($sex)->make(),
            'sex' => $sex,
        ]);
    }

    public function update(AnimalSexRequest $request, int $id): RedirectResponse
    {
        flash(
            __(''),
            __(''),
        )->show();

        return redirect()->route('admin.animals.sexes.index');
    }

    public function delete(): RedirectResponse
    {
        flash(
            __(''),
            __(''),
        )->show();

        return redirect()->route('admin.animals.sexes.index');
    }
}
