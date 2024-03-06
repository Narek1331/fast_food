<?php

namespace App\Repositories;

use App\Models\Ingredient;

class IngredientRepository{

    /**
     * Get all ingredients with their languages.
     *
     * @param int $paginate The number of items per page for pagination
     * @return \Illuminate\Pagination\LengthAwarePaginator The paginated list of ingredients with languages
     */
    public function getAllWithLanguages(int $paginate = 5)
    {
        return Ingredient::with(['languages' => function ($query) {
                return $query->select('languageables.name', 'languages.name as code');
            }])->paginate($paginate);
    }

    /**
     * Get all ingredients with translations for the current locale.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of ingredients with translations
     */
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

    /**
     * Store a new ingredient.
     *
     * @param array $data The data to create the ingredient
     * @return \App\Models\Ingredient The created ingredient
     */
    public function store($data = [])
    {
        return Ingredient::create($data);
    }

    /**
     * Find an ingredient by its ID or fail if not found.
     *
     * @param int $ingredient_id The ID of the ingredient
     * @return \App\Models\Ingredient The found ingredient
     */
    public function findOrFailById(int $ingredient_id)
    {
        return Ingredient::findOrFail($ingredient_id);
    }

    /**
     * Find an ingredient by its ID.
     *
     * @param int $ingredient_id The ID of the ingredient
     * @return \App\Models\Ingredient|null The found ingredient or null if not found
     */
    public function find(int $ingredient_id)
    {
        return Ingredient::find($ingredient_id);
    }

    /**
     * Delete an ingredient by its ID.
     *
     * @param int $ingredient_id The ID of the ingredient to delete
     * @return bool True if the ingredient is successfully deleted, false otherwise
     */
    public function destroy(int $ingredient_id)
    {
        $ingredient = $this->find($ingredient_id);
        $ingredient->languages()->detach();
        return $ingredient->delete();
    }

    /**
     * Find an ingredient with all its languages by ID.
     *
     * @param int $ingredient_id The ID of the ingredient
     * @return \App\Models\Ingredient|null The found ingredient with its languages or null if not found
     */
    public function findWithAllLanguages(int $ingredient_id)
    {
        return Ingredient::with(['languages' => function ($query) {
            return $query->select('languageables.name', 'languages.name as code');
        }])->find($ingredient_id);    
    }

}
