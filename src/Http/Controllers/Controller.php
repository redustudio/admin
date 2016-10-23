<?php

namespace Reduvel\Admin\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        return view('reduvel.admin::layouts.master');
    }
}
