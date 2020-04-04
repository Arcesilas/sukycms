<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AnimalNoteFilters;
use App\Models\AnimalNote;
use App\Support\Crud\CrudChild;
use App\Support\Crud\Fields\Text;
use App\Support\Orderable;
use Illuminate\Pagination\LengthAwarePaginator;

class AnimalNoteController extends AdminBaseController
{
    use CrudChild, Orderable;

    protected string $model = AnimalNote::class;

    protected string $parentRelationship = 'notes';

    protected string $namespace = 'animals.notes';

    public function indexQuery(): LengthAwarePaginator
    {
        return AnimalNote::query()->filter(app(AnimalNoteFilters::class))->paginate();
    }

    public function fields(): array
    {
        return [
            (new Text)->make('title'),
            (new Text)->align('right')->make('actions'),
        ];
    }
}
