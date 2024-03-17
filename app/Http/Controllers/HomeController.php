<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\LanguageService;

class HomeController extends Controller
{
    protected $category_service;
    protected $lang_service;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\CategoryService  $category_service
     * @param  \App\Services\LanguageService  $lang_service
     * @return void
     */
    public function __construct(
        CategoryService $category_service,
        LanguageService $lang_service
    )
    {
        $this->category_service = $category_service;
        $this->lang_service = $lang_service;
    }

    /**
     * Display the home page.
     *
     * @return \Illuminate\Contracts\View\View The home page view
     */
    public function index()
    {
        // Retrieve all categories
        $categories = $this->category_service->getAll();

        // Retrieve all languages
        $languages = $this->lang_service->getAll();

        // Pass categories and languages to the view
        return view('main.home', [
            'categories' => $categories,
            'languages' => $languages
        ]);
    }
}
