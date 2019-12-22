<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Users\UserRole;
use App\Models\Animal;
use App\Models\AnimalSex;
use App\Models\AnimalLocation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends AdminBaseController
{
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }
}
