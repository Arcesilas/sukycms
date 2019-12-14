<?php

namespace Tests\Browser\Auth;

use App\Enum\Users\UserRole;
use App\Enum\Users\UserStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Auth\LoginPage;
use Tests\Browser\Pages\Auth\LogoutPage;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /** @test */
    public function a_registered_user_can_login(): void
    {
        $email = 'sukycms-user@gmail.com';
        $password = 'secret';

        $user = factory(User::class)->create([
            'email' => $email,
            'password' => $password,
            'role' => UserRole::USER,
            'status' => UserStatus::ACTIVE,
        ]);

        $this->browse(static function (Browser $browser) use ($email, $password, $user) {
            $browser->visit(new LoginPage())
                ->type('@email', $email)
                ->type('@password', $password)
                ->press('@submit')
                ->assertPathIs(route('web.home', [], false))
                ->assertAuthenticatedAs($user)
                ->visit(new LogoutPage());
        });
    }

    /** @test */
    public function a_admin_user_can_login_to_admin(): void
    {
        $email = 'sukycms-admin@gmail.com';
        $password = 'secret';

        $admin = factory(User::class)->create([
            'email' => $email,
            'password' => $password,
            'role' => UserRole::ADMIN,
            'status' => UserStatus::ACTIVE,
        ]);

        $this->browse(static function (Browser $browser) use ($email, $password, $admin) {
            $browser->visit(new LoginPage())
                ->type('@email', $email)
                ->type('@password', $password)
                ->press('@submit')
                ->assertPathIs(route('admin.dashboard', [], false))
                ->assertAuthenticatedAs($admin)
                ->visit(new LogoutPage());
        });
    }
}
