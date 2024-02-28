<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SizeService;
use App\Http\Requests\StoreOrUpdateSizeRequest;

class SizeController extends Controller
{
    public function __construct(
        SizeService $size_serv
        ){
        $this->size_serv = $size_serv;
    }

    public function index(){
        $sizes = $this->size_serv->paginateAll(5);
        return view('admin.product.size.index',['sizes'=>$sizes]);
    }

    public function create(){
        return view('admin.product.size.create');
    }

    public function store(StoreOrUpdateSizeRequest $request){
        $this->size_serv->store($request->name);

        return redirect()->route('admin.product.size');
    }

    public function destroy(int $id){
        $this->size_serv->store($request->name);

        return redirect()->route('admin.product.size');
    }
}
