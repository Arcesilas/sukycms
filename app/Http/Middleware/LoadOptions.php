<?php

namespace App\Http\Middleware;

use App\Models\Option;
use Closure;
use Illuminate\Http\Request;

class LoadOptions
{
    public function handle(Request $request, Closure $next)
    {
        $options = Option::where('autoload', true)->get(['key', 'value']);

        app()->singleton('options', static function () use ($options) {
            return $options;
        });

        return $next($request);
    }
}
