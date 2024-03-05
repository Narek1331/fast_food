<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(CategoryService $category_serv){
        $this->category_serv = $category_serv;
    }

    public function index(){
        $categories = $this->category_serv->getAll();
        return view('admin.product.category.index',['categories' => $categories]);
    }
}
