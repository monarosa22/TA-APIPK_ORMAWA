<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard_admin()
    {
        return view("super_admin.dashboard");
    }

    public function dashboard_wadir()
    {
        return view("wadir.dashboard");
    }

    public function dashboard_ormawa()
    {
        return view("ormawa.dashboard");
    }
}
