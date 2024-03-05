<?php

namespace App\Repositories;
use App\Models\Ingredient;

class IngredientRepository{

    public function getAllWithLanguages(int $paginate = 5)
    {
        return Ingredient::with(['languages' => function ($query) {
                return $query->select('languageables.name', 'languages.name as code');
            }])->paginate($paginate);
    }

    public function getAll()
    {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');
        $l = $localeMappings[$locale];
        return Ingredient::whereHas('translate', function ($query) use ($l) {
                $query->where('language_id', $l);
            })
            ->with('translate')
            ->get();
    }

    public function store($data = []){
        return Ingredient::create($data);
    }

    public function findOrFailById(int $ingredient_id){
        return Ingredient::findOrFail($ingredient_id);
    }

    public function find(int $ingredient_id){
        return Ingredient::find($ingredient_id);
    }

    public function destroy(int $ingredient_id){
        $ingredient = $this->find($ingredient_id);
        $ingredient->languages()->detach();
        return $ingredient->delete();
    }

    public function findWithAllLanguages(int $ingredient_id){
        return Ingredient::with(['languages' => function ($query) {
            return $query->select('languageables.name', 'languages.name as code');
        }])->find($ingredient_id);    
    }

}
