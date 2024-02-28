<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    public function __construct(CategoryService $category_serv){
        $this->category_serv = $category_serv;
    }
    public function index(){
        $c = $this->category_serv->getAll();

        dd($c);


    }
}
