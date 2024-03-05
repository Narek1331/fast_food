<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Auth\LoginRequest;


class AuthController{

    public function login(){
        return view('admin.auth.login');
    }

    public function signin(LoginRequest $request){
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.profile');
        } else {
            // Authentication failed...
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
