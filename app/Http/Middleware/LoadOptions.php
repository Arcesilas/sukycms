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

        date_default_timezone_set(option('timezone'));
        app()->setLocale(option('language'));
        setlocale(LC_TIME, option('language'));

        return $next($request);
    }
}
