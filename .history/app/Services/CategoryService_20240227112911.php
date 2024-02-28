<?php
namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService{

    public function __construct(CategoryRepository $category_repo){
        $this->category_repo = $category_repo;
    }

    public function getAll(){
        return $this->category_repo->getAll();
    }

    public function store($data){
        return $this->category_repo->store($data);
    }

    public function findById($id){
        return $this->category_repo->findById($id);
    }
}
