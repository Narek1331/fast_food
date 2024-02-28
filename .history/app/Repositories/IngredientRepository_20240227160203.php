<?php

namespace App\Repositories;
use App\Models\Ingredient;

class IngredientRepository{

    public function getAllWithLanguages()
    {
        return Ingredient::with(['languages' => function ($query) {
                return $query->select('languageables.name', 'languages.name as code');
            }])->paginate(5);
    }

}
