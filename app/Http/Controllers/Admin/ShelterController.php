<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\ShelterForm;
use App\Support\FlashNotification;

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
        (new FlashNotification('Prueba', 'pruebita'))->render();

        return redirect()->back();
    }
}
