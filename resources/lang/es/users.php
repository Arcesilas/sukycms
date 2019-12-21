<?php

use App\Enum\Users\UserRole;
use App\Enum\Users\UserStatus;

return [

    'list' => 'Listado de usuarios',

    'form' => [
        'create' => [
            'title' => 'Registrar persona',
            'submit' => 'Registrar',
            'notify' => [
                'choices' => [
                    'No notificar',
                    'Notificar',
                ]
            ]
        ],
        'edit' => [
            'title' => 'Editar a :name',
            'submit' => 'Guardar',
        ]
    ],

    'roles' => [
        UserRole::USER => 'Usuario',
        UserRole::VOLUNTEER => 'Voluntario',
        UserRole::ADMIN => 'Administrador',
    ],

    'statuses' => [
        UserStatus::ACTIVE => 'Activo',
        UserStatus::PENDING => 'Pendiente',
        UserStatus::BANNED => 'Bloqueado',
    ],

];
