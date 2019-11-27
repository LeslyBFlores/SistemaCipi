<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
Use Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm () {
        return view('welcome');
    }

    public function login() {
        $credentials = $this->validate(request(), [
            $this->email() => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()
                ->withErrors([$this->email() => trans('auth.failed')])
                ->withInput(request([$this->email()]));
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function email() {
        return 'email';
    }

}
