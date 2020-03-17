<?php

return [

    'name' => [
        'required' => true,
        'autoload' => true,
        'default' => 'SukyCMS',
    ],
    'email' => [
        'required' => true,
        'autoload' => true,
        'default' => 'sukycms@gmail.com',
    ],
    'address' => [
        'required' => false,
        'autoload' => false,
        'default' => null,
    ],
    'postal_code' => [
        'required' => false,
        'autoload' => false,
        'default' => null,
    ],
    'city' => [
        'required' => false,
        'autoload' => false,
        'default' => null,
    ],
    'country' => [
        'required' => false,
        'autoload' => false,
        'default' => null,
    ],
    'domain' => [
        'required' => true,
        'autoload' => true,
        'default' => 'sukycms.test',
    ],
    'subdomain' => [
        'required' => true,
        'autoload' => true,
        'default' => 'cms',
    ],
    'language' => [
        'required' => true,
        'autoload' => true,
        'default' => 'es',
    ],
    'timezone' => [
        'required' => true,
        'autoload' => true,
        'default' => 'Europe/Madrid',
    ],
    'date_format' => [
        'required' => true,
        'autoload' => true,
        'default' => 'd/m/Y',
    ],
    'datetime_format' => [
        'required' => true,
        'autoload' => true,
        'default' => 'd/m/Y H:i',
    ],
];
