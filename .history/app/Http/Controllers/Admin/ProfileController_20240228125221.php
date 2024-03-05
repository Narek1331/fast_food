<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SizeService;

class ProfileController extends Controller
{


    public function index(){
        return view('admin.profile.index');
    }
}
