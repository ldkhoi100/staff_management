<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'min:5', 'max:30', 'unique:users', 'regex:/^[a-zA-Z0-9]{5,}$/'],
            'email' => ['required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z\-]+\.)+[a-z]{2,6}$/ix', 'email:rfc,dns', 'max:99', 'unique:users'],
            // 'phone' => ['required', 'numeric', 'unique:users', 'min:9'],
            // 'address' => ['required', 'string', 'min:3', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'g-recaptcha-response' => ['required', 'captcha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            // 'username' => $data['username'],
            'email' => $data['email'],
            // 'phone' => $data['phone'],
            // 'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}