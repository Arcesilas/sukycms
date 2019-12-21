<?php

use App\Enum\Users\UserRole;

return [

    'list' => 'Listado de usuarios',

    'roles' => [
        UserRole::USER => 'Usuario',
        UserRole::VOLUNTEER => 'Voluntario',
        UserRole::ADMIN => 'Administrador',
    ]

];
