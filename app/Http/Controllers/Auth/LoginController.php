<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    //Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
        // return redirect()->back()->with('toast', 'Thanks for visiting, See you again...');
        // return redirect()->route('home')->with('toast', 'Thanks for visiting, See you again...');
    }

    /**
     * After login redirect back to previous page.
     *
     * @return void
     */
    public function showLoginForm()
    {
        session(['link' => url()->previous()]);
        return view('auth.login');
    }

    // Login with username or password
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $user_block = User::where('block', 1)->where('username', request('username'))->orWhere('email', request('email'))->first();
        if ($user_block == true) {
            return back()->with('delete', 'Your account has been blocked, Contact us for more details!');
        }

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            // if (session('link')) {
            //     return redirect(session('link'))->with('toast', "Welcome back !");
            // } else {
            //     return back()->with('toast', "Welcome back !");
            // }
            if (count(Auth::user()->roles) == 0) {
                return redirect()->route("profile.index");
            } else {
                return redirect()->route("dashboard");
            }
        } else {
            return redirect()->route('login')->with('error', 'Username/email or password you entered are incorrect');
        }
    }
}