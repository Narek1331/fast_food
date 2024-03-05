<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VerifyService;

class EmailVerificationController extends Controller
{

    public function __construct(
        VerifyService $verify_service,
        ){
        $this->verify_service = $verify_service;
    }

    /**
     * Get the path that we should redirect to after verification.
     *
     * @return string
     */
    protected function redirectPath()
    {
        return route('auth.login', ['locale' => app()->getLocale()]);
    }


    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify($lang, $id, $token, Request $request)
    {
        if(!$this->verify_service->existsToken($id,$token)){
            return redirect()->route('auth.login',['locale'=>app()->getLocale()])
            ->with('success',__('messages.Invalid verified email token'));
        }

        $this->verify_service->destroyToken($id,$token);
        return redirect()->route('auth.login',['locale'=>app()->getLocale()])
            ->with('success',__('messages.email address verified successfully. you can login'));
    }
}

