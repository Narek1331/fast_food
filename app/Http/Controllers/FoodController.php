<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\ProductService;

class FoodController extends Controller
{
    public function __construct(
        CategoryService $category_service,
        ProductService $product_service
    ){
        $this->category_service = $category_service;
        $this->product_service = $product_service;
    }

    public function index(){
        $categories = $this->category_service->getAll();
        $products = $this->product_service->paginateAll();
        // dd($products);
        return view('main.shop.index',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
