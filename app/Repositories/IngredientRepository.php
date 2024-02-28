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

    public function getAll()
    {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');
        $l = $localeMappings[$locale];
        return Ingredient::whereHas('translate', function ($query) use ($l) {
                $query->where('language_id', $l);
            })->get();
    }

}
