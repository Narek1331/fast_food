<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Requests\Auth\SigninRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Services\UserService;
use App\Services\VerifyService;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        UserService $user_service,
        VerifyService $verify_service,
        ){
        $this->user_service = $user_service;
        $this->verify_service = $verify_service;
    }

    public function login(){
        return view('main.auth.login');
    }

    public function register(){
        return view('main.auth.register');
    }

    public function forgotPassword(){
        return view('main.auth.forgot_password');
    }

    public function signup(SignupRequest $request){

        $user = $this->user_service->storeCustomUser([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'phone_number' => $request['phone_number'],
        ]);

        $token = sha1($user->getEmailForVerification());
        $this->verify_service->storeToken($user->id,$token);
        $user->notify(new VerifyEmail($token));

        return redirect()->back()->with('success', trans('messages.confirm_email'));

    }

    public function signin(SigninRequest $request){

        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->route('home',['locale'=>app()->getLocale()]);
        }

        return back()->withErrors([
            'password' => trans('validation.wrong_password'),
        ]);

    }

    public function forgotPasswordSave(ForgotPasswordRequest $request){
        $user = $this->user_service->findByEmail($request->email);

        $this->user_service->updatePassword($user->id,$request->password);

        $token = sha1($user->getEmailForVerification());
        $this->verify_service->storeToken($user->id,$token);
        $user->notify(new VerifyEmail($token));

        return redirect()->route('auth.login',['locale'=>app()->getLocale()])->with('success', trans('messages.confirm_email'));

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home',['locale'=>app()->getLocale()]);
    }
}
