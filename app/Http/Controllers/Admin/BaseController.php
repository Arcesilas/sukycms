<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    public function __construct()
    {
        view()->share('sidebar', $this->getSidebar());
    }

    abstract protected function getSidebar(): array;
}
