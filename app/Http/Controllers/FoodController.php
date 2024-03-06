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

    public function index(Request $request){
        $params = [];

        if($request->segment(3)){
            $params['category_id'] = $request->segment(3);
        }

        if(isset($request->q)){
            $params['q'] = $request->q;
        }

        $categories = $this->category_service->getAll();
        $products = $this->product_service->paginateAll($params);

        return view('main.shop.index',[
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
