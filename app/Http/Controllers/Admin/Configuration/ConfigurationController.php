<?php

namespace App\Http\Controllers\Admin\Configuration;

use App\Http\Controllers\Admin\BaseController;

abstract class ConfigurationController extends BaseController
{
    protected function getSidebar(): array
    {
        return [
            [
                'title' => __('admin.sidebar.configuration'),
                'links' => [
                    [
                        'title' => __('admin.sidebar.general'),
                        'icon' => 'fas fa-cog fa-fw',
                        'url' => route('admin.dashboard'),
                        'active' => 'admin',
                    ],
                    [
                        'title' => __('admin.sidebar.modules'),
                        'icon' => 'fas fa-columns fa-fw',
                        'url' => route('admin.dashboard'),
                        'active' => 'admin',
                    ],
                    [
                        'title' => __('admin.sidebar.socialnetworks'),
                        'icon' => 'fas fa-network-wired fa-fw',
                        'url' => '',
                    ],
                ],
            ],
            [
                'title' => __('admin.sidebar.maintenance'),
                'links' => [
                    [
                        'title' => __('admin.sidebar.backups'),
                        'icon' => 'fas fa-database fa-fw',
                        'url' => route('admin.shelter.form'),
                        'active' => 'admin/shelter*',
                    ],
                    [
                        'title' => __('admin.sidebar.updates'),
                        'icon' => 'fas fa-sync-alt fa-fw',
                        'url' => '',
                    ],
                ],
            ],
        ];
    }
}
