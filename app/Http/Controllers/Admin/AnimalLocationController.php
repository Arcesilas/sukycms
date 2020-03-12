<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalLocationFilters;
use App\Models\AnimalLocation;
use App\Support\Crud\Crud;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class AnimalLocationController extends AdminBaseController
{
    use Crud, Orderable;

    protected string $model = AnimalLocation::class;

    protected string $namespace = 'animals.locations';

    public function indexQuery(): Collection
    {
        return AnimalLocation::withCount('animals')
            ->filter(app(AnimalLocationFilters::class))
            ->orderBy('order')
            ->get();
    }

    public function viewShare(): array
    {
        return [
            'locations' => AnimalLocation::withCount('animals')
                ->orderBy('order')
                ->get(),
        ];
    }

    public function preDestroy(Model $model): bool
    {
        if ($model->animals->count()) {
            $newModel = AnimalLocation::findOrFail(request()->get('model_id'));

            $model->animals()->update([
                'location_id' => $newModel->id,
            ]);
        }

        if (AnimalLocation::count() === 1) {
            flash(
                __($this->transNamespace.'.destroy.error'),
            )->show();
    
            return false;
        }

        return true;
    }

    public function fields(): array
    {
        return [
            (new Text)->make('location'),
            (new Text)->align('right')->make('animals_count'),
            (new Text)->align('center')->make('order'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
