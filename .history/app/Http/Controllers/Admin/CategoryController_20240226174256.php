<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(){

    }

    public function index(){
        return view('admin.product.category.index');
    }
}
