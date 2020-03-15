<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\ShelterForm;
use App\Http\Requests\Admin\ShelterRequest;
use App\Models\Option;

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

    public function update(ShelterRequest $request)
    {
        Option::set($request->validated());
        flash(__('forms.saved'))->show();

        return redirect()->back();
    }
}
