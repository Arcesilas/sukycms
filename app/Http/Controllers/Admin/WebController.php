<?php


namespace App\Http\Controllers\Admin;


use Illuminate\View\View;

class WebController extends AdminBaseController
{
    public function index(): View
    {
        return view('admin.web.index');
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
                        'url' => '',
                        'active' => 'admin'
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
                ],
            ],
        ];
    }
}
