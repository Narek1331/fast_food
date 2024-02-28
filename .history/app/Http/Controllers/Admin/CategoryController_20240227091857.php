<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\LanguageService;

class CategoryController extends Controller
{
    public function __construct(CategoryService $category_serv){
        $this->category_serv = $category_serv;
    }

    public function index(){
        $categories = $this->category_serv->getAll();
        return view('admin.product.category.index',['categories' => $categories]);
    }

    public function create(){
        return view('admin.product.category.create');
    }
}
