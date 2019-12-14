<?php

namespace Tests\Browser\Pages\Auth;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class LoginPage extends Page
{
    public function url(): string
    {
        return route('auth.login', [], false);
    }

    public function assert(Browser $browser): void
    {
        $browser->assertPathIs($this->url());
    }

    public function elements(): array
    {
        return [
            '@email' => 'input[name="email"]',
            '@password' => 'input[name="password"]',
            '@submit' => 'button[type="submit"]',
        ];
    }
}
