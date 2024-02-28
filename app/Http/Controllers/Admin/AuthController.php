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
        if (Auth::check()) {
            return redirect()->route('admin.profile');
        }
        return view('admin.auth.login');
    }

    public function signin(LoginRequest $request){
        if (Auth::attempt($request->only(['email','password']))) {

            if(auth()->user()->isAdminOrModerator()){
                return redirect()->route('admin.profile');
            }
            Auth::logout();
            return back()->withErrors(['email' => 'You do not have permission to access this area']);
        }

        return back()->withErrors(['email' => 'Invalid credentials']);

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
