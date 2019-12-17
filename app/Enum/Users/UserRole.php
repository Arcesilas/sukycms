<?php

namespace App\Enum\Users;

use App\Enum\Enum;

final class UserRole extends Enum
{
    public const USER = 'user';

    public const VOLUNTEER = 'volunteer';

    public const ADMIN = 'admin';
}
