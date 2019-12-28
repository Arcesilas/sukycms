<?php

namespace App\Http\Middleware;

use App\Models\Option;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class LoadOptions
{
    public function handle(Request $request, Closure $next)
    {
        $options = Option::where('autoload', true)->get(['key', 'value']);

        app()->singleton('options', static function () use ($options) {
            return $options->pluck('value', 'key')->toArray();
        });

        $language = $options->first(fn ($option) => $option->key === 'language')->value;
        $timezone = $options->first(fn ($option) => $option->key === 'timezone')->value;

        date_default_timezone_set($timezone);
        app()->setLocale($language);
        setlocale(LC_TIME, $language);

        return $next($request);
    }
}
