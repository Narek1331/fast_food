<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Auth\LoginRequest;


class AuthController{

    public function login(){
        return view('admin.auth.login');
    }

    public function signin(LoginRequest $request){
        dd(99);
    }
}
