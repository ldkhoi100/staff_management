<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Validator;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use Hash;

class TestController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('test.list');
    }

    public function usersData()
    {
        return Datatables::of(User::query())->make(true);
    }
}