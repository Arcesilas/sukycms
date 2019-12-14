<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\ShelterForm;

class ShelterController extends AdminBaseController
{
    public function form(ShelterForm $form)
    {
        return view('admin.shelter.form', [
            'form' => $form
                ->setData(option())
                ->make(),
        ]);
    }

    public function update()
    {

    }
}
