<?php
namespace App\Services;

class AuthService{

    // public function __construct(CategoryRepository $category_repo){
    //     $this->category_repo = $category_repo;
    // }

    public function getAll(){
        return $this->category_repo->getAll();
    }
}
