<?php

namespace App\Support\Crud;

use Illuminate\Database\Eloquent\Model;

trait DontDestroyLast
{
    public function dontDestroyLast(Model $model): bool
    {
        if ($model->animals->count()) {
            $newModel = (new $this->model)->findOrFail(request()->get('model_id'));

            if ($newModel->id === $model->id) {
                flash(
                    __($this->transNamespace.'.destroy.error'),
                    '',
                    'error',
                )->show();
        
                return false;
            }

            $model->animals()->update([
                'location_id' => $newModel->id,
            ]);
        }

        if ((new $this->model)->count() === 1) {
            flash(
                __($this->transNamespace.'.destroy.error'),
                '',
                'error',
            )->show();
    
            return false;
        }

        return true;
    }
}