<?php

namespace App\Http\Controllers\Admin;


class AuthController{

    public function login(){
        return view('admin.auth.login');
    }

    public function signin(){
        dd(99);
    }
}
