<?php
namespace App\Services;

// use App\Repositories\ProductRepository;

class UserService{

    public function __construct(ProductRepository $product_repo){
        $this->product_repo = $product_repo;
    }

    public function getAll(){
        return $this->product_repo->getAll();
    }
}
