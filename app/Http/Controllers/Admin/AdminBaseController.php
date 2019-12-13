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
                        'icon' => 'fas fa-home',
                        'url' => '',
                    ],
                ],
            ],
            [
                'title' => 'Gestión',
                'links' => [
                    [
                        'title' => 'Animales',
                        'icon' => 'fas fa-paw',
                        'url' => '',
                        'submenu' => [
                            [
                                'title' => 'Listado',
                                'icon' => 'fas fa-list',
                                'url' => '',
                            ],
                            [
                                'title' => 'Crear ficha',
                                'icon' => 'fas fa-plus',
                                'url' => '',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
