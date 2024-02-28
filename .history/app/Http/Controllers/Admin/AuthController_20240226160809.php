<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController{

    public function login(){
        return view('admin.auth.login');
    }

    public function signin(LoginRequest $request){
        if (Auth::attempt($credentials)) {
            dd(Auth()->user());

            return redirect()->route('admin.profile');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
