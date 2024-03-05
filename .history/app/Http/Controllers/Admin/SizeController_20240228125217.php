<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct(
        SizeService $size_serv
        ){
        $this->size_serv = $size_serv;
    }

    public function index(){

        return view('admin.product.size.index');
    }
}
