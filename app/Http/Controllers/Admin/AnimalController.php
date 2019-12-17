<?php

namespace App\Http\Controllers\Admin;

class AnimalController extends AdminBaseController
{
    public function configuration()
    {
        return view('admin.animals.configuration');
    }
}
