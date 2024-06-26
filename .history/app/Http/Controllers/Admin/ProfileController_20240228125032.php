<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SizeService;

class ProfileController extends Controller
{
    public function __construct(
        SizeService $size_serv
        ){
        $this->size_serv = $size_serv;
    }

    public function index(){
        $sizes = $this->size_serv->paginateAll(5);
        return view('admin.profile.index');
    }
}
