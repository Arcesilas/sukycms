<?php

namespace App\Http\Requests;

use App\Support\FlashNotification;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator): void
    {
        flash(
            __('forms.notification.error.title'),
            __('forms.notification.error.text'),
            FlashNotification::ERROR
        )->show();

        parent::failedValidation($validator);
    }
}
