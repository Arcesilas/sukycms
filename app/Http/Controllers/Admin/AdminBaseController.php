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
                        'icon' => 'fas fa-home fa-fw',
                        'url' => '',
                    ],
                ],
            ],
            [
                'title' => 'Gestión',
                'links' => [
                    [
                        'title' => 'Animales',
                        'icon' => 'fas fa-paw fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => 'Listado',
                                'url' => '',
                            ],
                            [
                                'title' => 'Crear ficha',
                                'url' => '',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Artículos',
                        'icon' => 'fas fa-file-alt fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => 'Listado',
                                'url' => '',
                            ],
                            [
                                'title' => 'Crear ficha',
                                'url' => '',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Páginas',
                        'icon' => 'fas fa-file-powerpoint fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => 'Listado',
                                'url' => '',
                            ],
                            [
                                'title' => 'Crear ficha',
                                'url' => '',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
