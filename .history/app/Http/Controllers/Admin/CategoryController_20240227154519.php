<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\LanguageService;
use App\Http\Requests\Admin\CategoryLanguagesRequest;

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
        $languages = $this->language_serv->getAll();
        // $categories = $this->category_serv->getAllWithLanguages();
        return view('admin.product.category.index',['categories' => $categories,'languages'=>$languages]);
    }

    public function create(){
        $languages = $this->language_serv->getAll();
        return view('admin.product.category.create',['languages' => $languages]);
    }

    public function store(CategoryLanguagesRequest $request){
        $this->category_serv->store($request->validated());

        return redirect()->route('admin.product.category');
    }

    public function destroy(int $id){
        $category = $this->category_serv->findById($id);

        if(!$category){
            return redirect()->back()->withErrors(['Category not found']);
        }

        $this->category_serv->destroy($id);
        return redirect()->route('admin.product.category');
    }

    public function edit(int $id){
        $category = $this->category_serv->findById($id);

        if(!$category){
            return redirect()->back()->withErrors(['Category not found']);
        }

        return view('admin.product.category.edit',['category' => $category]);

    }

    public function update(int $id, CategoryLanguagesRequest $request){
        $category = $this->category_serv->findById($id);

        if(!$category){
            return redirect()->back()->withErrors(['Category not found']);
        }

        $this->category_serv->update($id,$request->validated());

        return redirect()->back();
    }
}
