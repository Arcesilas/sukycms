<?php

namespace App\Filters;

class AnimalSpeciesFilters extends Filter
{
    protected array $searchFields = [
        'species',
    ];
}
