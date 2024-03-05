<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthService;

class AuthController{

    public function __construct(AuthService $auth_serv){
        $this->auth_serv = $auth_serv;
    }
    public function login(){
        return view('admin.auth.login');
    }

    public function signin(LoginRequest $request){
        if (Auth::attempt($request->only(['email','password']))) {
            $user = auth()->user();
            dd($user->role_name);
            return redirect()->route('admin.profile');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
