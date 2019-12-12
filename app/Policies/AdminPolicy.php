<?php

namespace App\Policies;

use App\Enum\Users\UserRole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function access(User $user): bool
    {
        return in_array($user->role, [UserRole::VOLUNTEER, UserRole::ADMIN], true);
    }
}
