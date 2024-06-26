<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\LanguageService;

class ProductController extends Controller
{
    public function __construct(
        LanguageService $language_serv,
        ProductService $product_serv
        ){
        $this->language_serv = $language_serv;
        $this->product_serv = $product_serv;
    }

    public function index(){
        $products = $this->product_serv->getWithAllLanguages();
        $languages = $this->language_serv->getAll();
        // dd($products);
        return view('admin.product.index',['languages'=>$languages,'products'=>$products]);
    }

    public function show(){
        return view('admin.product.show');
    }

    public function edit(){
        return view('admin.product.edit');
    }

    public function create(){
        $languages = $this->language_serv->getAll();
        return view('admin.product.create',[
            'languages' => languages
        ]);
    }
}
