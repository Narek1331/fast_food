<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\LanguageService;

class CategoryController extends Controller
{
    public function __construct(
        CategoryService $category_serv,
        LanguageService $language_serv,

        ){
        $this->category_serv = $category_serv;
        $this->language_serv = $language_serv;
    }

    public function index(){
        $categories = $this->category_serv->getAll();
        return view('admin.product.category.index',['categories' => $categories]);
    }

    public function create(){
        $languages = $this->language_serv->getAll();
        return view('admin.product.category.create',['languages' => $languages]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);
    }
}
