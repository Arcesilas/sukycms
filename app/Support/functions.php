<?php

function option(string $key = null, $default = null) {
    if (! $key) {
        return app('options');
    }

    return app('options')[$key] ?? $default;
}
