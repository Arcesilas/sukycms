<?php

namespace App\Filters;

class UserFilters extends Filter
{
    protected array $searchFields = [
        'name', 'email'
    ];
}
