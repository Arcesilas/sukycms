<?php

namespace Tests\Browser\Pages\Auth;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class LogoutPage extends Page
{
    public function url(): string
    {
        return route('auth.logout');
    }
}
