<?php

use App\Support\FlashNotification;

function option(string $key = null, $default = null)
{
    if (! $key) {
        return app('options');
    }

    return app('options')[$key] ?? $default;
}

function flash(string $title, string $text = '', string $type = 'success')
{
    return new FlashNotification($title, $text, $type);
}

function activityLog(): \App\Models\ActivityLog
{
    return new \App\Models\ActivityLog();
}
