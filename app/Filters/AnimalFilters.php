<?php

namespace App\Filters;

class AnimalFilters extends Filter
{
    public array $filters = [
        'q',
        'species',
    ];

    protected array $searchFields = [
        'name',
    ];

    public function species(int $species_id)
    {
        $this->builder->where('species_id', $species_id);
    }
}
