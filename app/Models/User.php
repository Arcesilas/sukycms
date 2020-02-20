<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Forms\Admin\UserForm;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Filterable;

    public string $form = UserForm::class;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'last_login' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar()
    {
        if ($this->avatar) {
            return $this->avatar;
        }

        return asset('images/avatar.jpg');
    }

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // TODO: resize & refactor
    public function setAvatarAttribute($value): void
    {
        $this->attributes['avatar'] = asset('storage/' . request()
            ->file('avatar')
            ->store('images/avatar', 'public')
        );
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
