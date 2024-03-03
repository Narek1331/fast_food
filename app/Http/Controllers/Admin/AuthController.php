<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthService;
use App\Services\RoleService;
use App\Services\UserService;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\AddUserRequest;

class AuthController{

    public function __construct(
        AuthService $auth_serv,
        RoleService $role_serv,
        UserService $user_serv,
        ){
        $this->auth_serv = $auth_serv;
        $this->role_serv = $role_serv;
        $this->user_serv = $user_serv;
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

    public function changePassword(){
        return view('admin.auth.change_password');
    }

    public function addUser(){
        $roles = $this->role_serv->getAll();
        return view('admin.auth.add_user',['roles'=>$roles]);
    }

    public function saveChangePassword(ChangePasswordRequest $request){
        $result = $this->auth_serv->changePassword($request->validated());

        if ($result['status'] === 'error') {
            return redirect()->back()->withErrors(['old_password' => $result['message']]);
        }

        return redirect()->back()->with('success', $result['message']);
    }

    public function saveUser(AddUserRequest $request){
        $this->user_serv->store($request->validated());
        return redirect()->back();
    }
}
