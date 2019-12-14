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
                        'title' => 'Escritorio',
                        'icon' => 'fas fa-columns fa-fw',
                        'url' => '',
                        'active' => 'admin'
                    ],
                    [
                        'title' => 'Asociación',
                        'icon' => 'fas fa-heart fa-fw',
                        'url' => '',
                    ],
                    [
                        'title' => 'Estadísticas',
                        'icon' => 'fas fa-chart-bar fa-fw',
                        'url' => '',
                    ],
                    [
                        'title' => 'Calendario',
                        'icon' => 'fas fa-calendar fa-fw',
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
                    [
                        'title' => 'Personas',
                        'icon' => 'fas fa-users fa-fw',
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
                        'title' => 'Formularios',
                        'icon' => 'fas fa-clipboard-list fa-fw',
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
                        'title' => 'Archivos',
                        'icon' => 'fas fa-cloud-upload-alt fa-fw',
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
            [
                'title' => 'Soporte',
                'links' => [
                    [
                        'title' => 'Documentación',
                        'icon' => 'fas fa-file-alt fa-fw',
                        'url' => '',
                    ],
                    [
                        'title' => 'Contacto',
                        'icon' => 'fas fa-user fa-fw',
                        'url' => '',
                    ],
                    [
                        'title' => 'Preguntas frecuentes',
                        'icon' => 'fas fa-question-circle fa-fw',
                        'url' => '',
                    ],
                ],
            ],

        ];
    }
}
