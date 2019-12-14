<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminBaseController extends Controller
{
    public function __construct()
    {
        view()->share('sidebar', $this->getSidebar());
    }

    protected function getSidebar(): array
    {
        return [
            [
                'title' => __('admin.sidebar.general'),
                'links' => [
                    [
                        'title' => __('admin.sidebar.dashboard'),
                        'icon' => 'fas fa-columns fa-fw',
                        'url' => route('admin.dashboard'),
                        'active' => 'admin'
                    ],
                    [
                        'title' => __('admin.sidebar.shelter'),
                        'icon' => 'fas fa-heart fa-fw',
                        'url' => route('admin.shelter.form'),
                        'active' => 'admin/shelter*'
                    ],
                    [
                        'title' => __('admin.sidebar.stats'),
                        'icon' => 'fas fa-chart-bar fa-fw',
                        'url' => '',
                    ],
                    [
                        'title' => __('admin.sidebar.calendar'),
                        'icon' => 'fas fa-calendar fa-fw',
                        'url' => '',
                    ],
                ],
            ],
            [
                'title' => __('admin.sidebar.management'),
                'links' => [
                    [
                        'title' => __('admin.sidebar.animals'),
                        'icon' => 'fas fa-paw fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => __('admin.sidebar.list'),
                                'url' => '',
                            ],
                            [
                                'title' => __('admin.sidebar.add_animal'),
                                'url' => '',
                            ],
                        ],
                    ],
                    [
                        'title' => __('admin.sidebar.posts'),
                        'icon' => 'fas fa-file-alt fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => __('admin.sidebar.list'),
                                'url' => '',
                            ],
                            [
                                'title' => __('admin.sidebar.publish'),
                                'url' => '',
                            ],
                        ],
                    ],
                    [
                        'title' => __('admin.sidebar.pages'),
                        'icon' => 'fas fa-file-powerpoint fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => __('admin.sidebar.list'),
                                'url' => '',
                            ],
                            [
                                'title' => __('admin.sidebar.new'),
                                'url' => '',
                            ],
                        ],
                    ],
                    [
                        'title' => __('admin.sidebar.people'),
                        'icon' => 'fas fa-users fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => __('admin.sidebar.list'),
                                'url' => '',
                            ],
                            [
                                'title' => __('admin.sidebar.new'),
                                'url' => '',
                            ],
                        ],
                    ],
                    [
                        'title' => __('admin.sidebar.forms'),
                        'icon' => 'fas fa-clipboard-list fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => __('admin.sidebar.list'),
                                'url' => '',
                            ],
                            [
                                'title' => __('admin.sidebar.new'),
                                'url' => '',
                            ],
                        ],
                    ],
                    [
                        'title' => __('admin.sidebar.files'),
                        'icon' => 'fas fa-cloud-upload-alt fa-fw',
                        'url' => '#',
                        'submenu' => [
                            [
                                'title' => __('admin.sidebar.list'),
                                'url' => '',
                            ],
                            [
                                'title' => __('admin.sidebar.new'),
                                'url' => '',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => __('admin.sidebar.support'),
                'links' => [
                    [
                        'title' => __('admin.sidebar.documentation'),
                        'icon' => 'fas fa-file-alt fa-fw',
                        'url' => '',
                    ],
                    [
                        'title' => __('admin.sidebar.contact'),
                        'icon' => 'fas fa-user fa-fw',
                        'url' => '',
                    ],
                    [
                        'title' => __('admin.sidebar.faq'),
                        'icon' => 'fas fa-question-circle fa-fw',
                        'url' => '',
                    ],
                ],
            ],

        ];
    }
}
