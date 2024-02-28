<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\LanguageService;
use App\Services\CategoryService;
use App\Services\IngredientService;
use App\Services\SizeService;
use App\Http\Requests\Admin\ProductStoreRequest;

class ProductController extends Controller
{
    public function __construct(
        LanguageService $language_serv,
        ProductService $product_serv,
        CategoryService $category_serv,
        IngredientService $ingredient_serv,
        SizeService $size_serv
        ){
        $this->language_serv = $language_serv;
        $this->product_serv = $product_serv;
        $this->category_serv = $category_serv;
        $this->ingredient_serv = $ingredient_serv;
        $this->size_serv = $size_serv;
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
        $categories = $this->category_serv->getAll();
        $ingredients = $this->ingredient_serv->getAll();
        $sizes = $this->size_serv->getAll();

        // dd($categories);
        return view('admin.product.create',[
            'languages' => $languages,
            'categories' => $categories,
            'ingredients' => $ingredients,
            'sizes' => $sizes,
        ]);
    }

    public function store(ProductStoreRequest $request){
        // dd($request->all());
        $product = $this->product_serv->store($request->validated());
        return redirect()->route('admin.product');
    }
}
