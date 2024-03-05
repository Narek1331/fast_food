<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CategoryService $category_service
    )
    {
        $this->category_service = $category_service;
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

    public function contact(){
        return view('main.contact');
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
        $categories = $this->category_service->getAll();
        
        return view('main.home',[
            'categories' => $categories
        ]);
    }

    public function shop(){
        return view('main.shop.index');
    }

    public function shopSingle(){
        return view('main.shop.show');
    }


}
