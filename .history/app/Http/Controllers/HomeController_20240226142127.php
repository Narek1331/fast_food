<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function checkout(){
        return view('main.checkout');
    }

    public function testimonial(){
        return view('main.testimonial');
    }

    public function basket(){
        return view('main.basket.index');
    }

    public function notFound(){
        return view('main.not_found');
    }

    public function index(){
        return view('main.home');
    }

    public function shop(){
        return view('main.shop.index');
    }


}
