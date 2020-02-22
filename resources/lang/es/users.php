<?php

use App\Enum\Users\UserRole;
use App\Enum\Users\UserStatus;

return [

    'list' => 'Listado de usuarios',

    'description' => [
        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
        'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
    ],

    'create' => [
        'title' => 'Registrar persona',
        'submit' => 'Registrar',
        'notify' => [
            'choices' => [
                'No notificar',
                'Notificar',
            ],
        ],
    ],
    'edit' => [
        'title' => 'Editar a :title',
        'submit' => 'Guardar',
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
