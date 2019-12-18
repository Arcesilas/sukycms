<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    protected Request $request;

    protected Builder $builder;

    public array $filters = [
        'q',
    ];

    protected array $searchFields = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;
        foreach ($this->filters() as $filter => $options) {
            if ($options && method_exists($this, $filter)) {
                call_user_func_array(
                    [$this, $filter],
                    array_filter([$options])
                );
            }
        }

        return $this->builder;
    }

    protected function filters(): array
    {
        return $this->filters
            ? $this->request->only($this->filters)
            : $this->request->all();
    }

    public function q(string $search): void
    {
        foreach ($this->searchFields as $field) {
            $this->builder->orWhere($field, 'LIKE', "%{$search}%");
        }
    }
}
