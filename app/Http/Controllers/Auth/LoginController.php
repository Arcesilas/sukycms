<?php

namespace App\Http\Controllers\Auth;

use App\Forms\Auth\LoginForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    use ThrottlesLogins;

    public function form(LoginForm $form): View
    {
        return view('auth.login', [
            'form' => $form->make(),
        ]);
    }

    /**
     * @param \App\Http\Requests\Auth\LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->sendLockoutResponse($request);
        }

        $credentials = $request->only([$this->username(), 'password']);

        if (auth()->attempt($credentials, $request->filled('remember'))) {
            $this->clearLoginAttempts($request);

            return redirect()->route('web.home');
        }

        $this->incrementLoginAttempts($request);

        return redirect()->route('auth.login');
    }

    public function logout(Request $request)
    {
        $request->session()->regenerate();
        auth()->logout();

        return redirect()->route('auth.login');
    }

    public function username(): string
    {
        return 'email';
    }
}
