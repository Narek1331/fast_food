<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{

    public function __construct(ProductService $product_serv){
        $this->product_serv = $product_serv;
    }
    public function index(){

        $data = $this->product_serv->getAll();
        echo $data[0]['name'];
        echo '<br>';
        echo $data[0]['description'];
        echo '<br>';

    }
}
