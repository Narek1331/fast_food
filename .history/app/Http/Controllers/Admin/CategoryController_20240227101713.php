<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\LanguageService;
use Illuminate\Validation\Validator;


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

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        // $validatedData = Validator::make($request->all(), [
        //     '0' => 'required|string|max:250',
        //     '1' => 'required|string|max:250',
        //     '2' => 'required|string|max:250',
        // ])->validate();

        // $languages = $this->language_serv->getAll();

        // $validateArr = [];

        // foreach($languages as $lang){
        //     $validateArr[$lang->name] = 'required|string|max:250';
        // }

        // $validatedData = $request->validate($validateArr);

        // $this->category_serv->store($validatedData);

        // dd($validateArr);
    }
}
