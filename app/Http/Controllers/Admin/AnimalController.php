<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalFilters;
use App\Forms\Admin\AnimalForm;
use App\Http\Requests\Admin\AnimalRequest;
use App\Models\Animal;
use App\Models\Behavior;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnimalController extends AdminBaseController
{
    public function index(AnimalFilters $filter): View
    {
        $animals = Animal::filter($filter);

        return view('admin.animals.index', [
            'animals' => $animals->paginate(),
        ]);
    }

    public function create(AnimalForm $form): View
    {
        return view('admin.animals.create', [
            'form' => $form->make(),
            'behaviors' => Behavior::orderBy('order')->get(['id', 'behavior']),
        ]);
    }

    public function store(AnimalRequest $request): RedirectResponse
    {
        flash(
            __('animals.notification.store.title'),
            __('animals.notification.store.text'),
        )->show();

        return redirect()->route('admin.animals.index');
    }

    public function edit(AnimalForm $form, Animal $animal): View
    {
        $animal->load('behaviors');

        return view('admin.animals.edit', [
            'animal' => $animal,
            'form' => $form->setData($animal)->make(),
            'behaviors' => Behavior::orderBy('order')->get(['id', 'behavior']),
        ]);
    }

    public function update(AnimalRequest $request, Animal $animal): RedirectResponse
    {
        flash(
            __('animals.notification.update.title'),
            __('animals.notification.update.text'),
        )->show();

        return redirect()->route('admin.animals.edit', $animal);
    }
}
