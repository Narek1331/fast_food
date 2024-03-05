<?php

namespace App\Repositories;
use App\Models\Ingredient;

class IngredientRepository{

    public function getAll()
    {
        return Ingredient::get();
    }

}
