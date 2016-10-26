<?php

namespace Reduvel\Admin\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        app('reduvel.admin.menu')->add('Dashboard', ['route' => 'reduvel-admin:index'])
            ->data('icon', 'fa fa-dashboard')
            ->data('order', 1);
    }

    public function index()
    {
        return view('reduvel-admin::layouts.master');
    }
}
