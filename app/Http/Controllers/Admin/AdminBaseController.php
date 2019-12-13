<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminBaseController extends Controller
{
    public function __construct()
    {
        view()->share('sidebar', $this->getSidebar());
    }

    private function getSidebar(): array
    {
        return [
            [
                'title' => 'General',
                'links' => [
                    [
                        'title' => 'Dashboard',
                        'icon' => '',
                        'url' => '',
                    ],
                ],
            ],
            [
                'title' => 'Gestión',
                'links' => [
                    [
                        'title' => 'Animales',
                        'icon' => '',
                        'url' => '',
                        'submenu' => [
                            [
                                'title' => 'Listado',
                                'icon' => '',
                                'url' => '',
                            ],
                            [
                                'title' => 'Crear ficha',
                                'icon' => '',
                                'url' => '',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
