<?php

namespace App\Http\Controllers\Admin\Configuration;

use Illuminate\View\View;

class ModuleController extends ConfigurationController
{
    public function index(): View
    {
        return view('admin.configuration.modules.index');
    }
}
