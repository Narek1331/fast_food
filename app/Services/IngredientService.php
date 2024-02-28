<?php
namespace App\Services;

use App\Repositories\IngredientRepository;

class IngredientService{

    public function __construct(IngredientRepository $ingredient_repo){
        $this->ingredient_repo = $ingredient_repo;
    }

    public function getAll(){
        return $this->ingredient_repo->getAll();
    }
}
