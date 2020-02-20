<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

trait Orderable
{
    public function up(Model $model): RedirectResponse
    {
        $order = $model->order;
        $before = (new $model)->query()->where('order', $order - 1)->first();

        if ($before) {
            $model->order = $order - 1;
            $model->save();

            $before->order = $order;
            $before->save();

            flash(__('admin.order.success'))->show();
        }


        return redirect()->back();
    }

    public function down(Model $model): RedirectResponse
    {
        $order = $model->order;
        $after = (new $model)->query()->where('order', $order + 1)->first();

        if ($after) {
            $model->order = $order + 1;
            $model->save();

            $after->order = $order;
            $after->save();

            flash(__('admin.order.success'))->show();
        }

        return redirect()->back();
    }
}
