<?php
namespace App\Services;

use App\Repositories\LanguageRepository;

class LanguageService{

    public function __construct(CategoryRepository $category_repo){
        $this->category_repo = $category_repo;
    }

    public function getAll(){
        return $this->category_repo->getAll();
    }
}
