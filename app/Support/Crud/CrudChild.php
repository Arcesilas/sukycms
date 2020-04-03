<?php

namespace App\Support\Crud;

use App\Models\Attachment;
use App\Support\Attachmentable;
use App\Support\Forms\Form;
use App\Support\Orderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\View\View;

trait CrudChild
{
    protected string $viewNamespace;

    protected string $routeNamespace;

    protected string $transNamespace;

    public function __construct()
    {
        $this->setNamespaces();

        parent::__construct();
    }

    public function index(Model $parent): View
    {
        return view('admin.layouts.crud.index', array_merge([
            'fields' => $this->fields(),
            'items' => $this->indexQuery(),
            'parent' => $parent,
        ], $this->viewShare()));
    }

    public function create(Model $parent): View
    {
        if (view()->exists($this->viewNamespace.'.create')) {
            $view = $this->viewNamespace.'.create';
        } else {
            $view = 'admin.layouts.crud.create';
        }

        return view($view, array_merge([
            'form' => $this->form()->make(),
            'parent' => $parent,
        ], $this->formViewShare()));
    }

    public function store(Model $parent): RedirectResponse
    {
        $relationship = $parent->{$this->parentRelationship}();

        /** @var \App\Http\Requests\BaseRequest $validation */
        $validation = app($this->formRequest());

        $data = $validation->validated();
        $data[$relationship->getForeignKeyName()] = $parent->id;

        $model = $parent->{$this->parentRelationship}()->forceCreate($data);

        activityLog()->onModel($model)->log();

        flash(
            __($this->transNamespace.'.create.success'),
        )->show();

        return redirect()->route($this->routeNamespace.'.index', $parent);
    }

    public function edit(Model $parent, Model $model): View
    {
        if (view()->exists($this->viewNamespace.'.edit')) {
            $view = $this->viewNamespace.'.edit';
        } else {
            $view = 'admin.layouts.crud.edit';
        }

        return view($view, array_merge([
            'form' => $this->form()->setData($model)->make(),
            'model' => $model,
            'parent' => $parent,
        ], $this->formViewShare()));
    }

    public function update(Model $parent, Model $model): RedirectResponse
    {
        /** @var \App\Http\Requests\BaseRequest $validation */
        $validation = app($this->formRequest());

        foreach ($validation->validated() as $key => $value) {
            $model->$key = $value;
        }

        $oldAttributes = Arr::only($model->getOriginal(), array_keys($model->getDirty()));
        $model->save();

        $this->attachments($model);

        $model->oldAttributes = $oldAttributes;

        activityLog()->onModel($model)->log();

        flash(
            __($this->transNamespace.'.edit.success'),
        )->show();

        return redirect()->route($this->routeNamespace.'.edit', [$parent, $model]);
    }

    public function destroy(Model $parent, Model $model): RedirectResponse
    {
        if (! $this->preDestroy($model)) {
            return redirect()->route($this->routeNamespace.'.index');
        }

        if (in_array(DontDestroyLast::class, class_uses($this)) && ! $this->dontDestroyLast($model)) {
            return redirect()->route($this->routeNamespace.'.index', $parent);
        }

        $model->delete();

        if (in_array(Orderable::class, class_uses($this))) {
            (new $model)->where('order', '>', $model->order)->decrement('order');
        }

        flash(
            __($this->transNamespace.'.destroy.success'),
        )->show();

        return redirect()->route($this->routeNamespace.'.index', $parent);
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

    private function attachments(Model $model): array
    {
        $attachments = [];

        if (
            ! in_array(Attachmentable::class, class_uses($model)) ||
            ! request()->hasFile('attachments')
        ) {
            return [];
        }

        foreach (request()->file('attachments') as $file) {
            $uploaded = $file->storeAs(
                'health',
                $file->getClientOriginalName(),
                'uploads'
            );

            $attachment = new Attachment();
            $attachment->file = $uploaded;
            $attachment->size = $file->getSize();
            $attachment->type = $file->getMimeType();
            $attachment->attachmentable()->associate($model);
            $attachment->save();

            $attachments[] = $attachment;
        }

        return $attachments;
    }
}
