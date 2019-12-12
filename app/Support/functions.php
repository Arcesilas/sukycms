<?php

function option(string $key, $default = null) {
    return app('options')[$key] ?? $default;
}
