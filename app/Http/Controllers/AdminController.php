<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Index method for Admin Controller
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function error404()
    {
        return view('admin.404');
    }

    public function blank()
    {
        return view('admin.blank');
    }

    public function button()
    {
        return view('admin.button');
    }

    public function card()
    {
        return view('admin.card');
    }

    public function chart()
    {
        return view('admin.chart');
    }

    public function forgotpassword()
    {
        return view('admin.forgot-password');
    }

    public function table()
    {
        return view('admin.table');
    }

    public function loginadmin()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function animation()
    {
        return view('admin.utilities.animation');
    }

    public function border()
    {
        return view('admin.utilities.border');
    }

    public function color()
    {
        return view('admin.utilities.color');
    }

    public function orther()
    {
        return view('admin.utilities.orther');
    }
}