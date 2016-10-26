<?php

namespace Reduvel\Admin\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        app('reduvel.admin.menu')->add('Dashboard', ['route' => 'reduvel-admin:index'])
            ->data('icon', 'fa fa-dashboard');

        app('reduvel.admin.menu')->add('Articles', ['url' => url('reduvel-admin:index')])
            ->data('icon', 'fa fa-files-o');

        $samplePage = app('reduvel.admin.menu')->add('Sample Page', ['route' => 'reduvel-admin:index'])
            ->id('sample-page')
            ->data('icon', 'fa fa-file');

        $samplePage->add('Blank');
        $samplePage->add('Login');
    }

    public function index()
    {
        return view('reduvel-admin::layouts.master');
    }
}
