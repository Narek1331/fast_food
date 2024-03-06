<?php
namespace App\Services;

use App\Repositories\IngredientRepository;

class IngredientService{

    public function __construct(IngredientRepository $ingredient_repo){
        $this->ingredient_repo = $ingredient_repo;
    }

    /**
     * Get all ingredients.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of ingredients
     */
    public function getAll(){
        return $this->ingredient_repo->getAll();
    }

    /**
     * Paginate all ingredients.
     *
     * @param int $paginate The number of items per page for pagination
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated list of ingredients
     */
    public function paginateAll(int $paginate = 5){
        return $this->ingredient_repo->getAllWithLanguages($paginate);
    }

    /**
     * Find an ingredient by its ID or fail if not found.
     *
     * @param int $ingredient_id The ID of the ingredient
     * @return \App\Models\Ingredient The found ingredient
     */
    public function findOrFailById(int $ingredient_id){
        return $this->ingredient_repo->findOrFailById($ingredient_id);
    }

    /**
     * Find an ingredient with all its languages by its ID.
     *
     * @param int $ingredient_id The ID of the ingredient
     * @return \App\Models\Ingredient The found ingredient with all its languages
     */
    public function findWithAllLanguages(int $ingredient_id){
        return $this->ingredient_repo->findWithAllLanguages($ingredient_id);
    }

    /**
     * Delete an ingredient by its ID.
     *
     * @param int $ingredient_id The ID of the ingredient to delete
     * @return bool True if the ingredient is successfully deleted, false otherwise
     */
    public function destroy(int $ingredient_id){
        return $this->ingredient_repo->destroy($ingredient_id);
    }

    /**
     * Store a new ingredient.
     *
     * @param array $datas The data to create the ingredient
     * @return \App\Models\Ingredient The created ingredient
     */
    public function store($datas){
        $ingredient = $this->ingredient_repo->store([]);
        $localeMappings = config('app.languages');

        foreach($localeMappings as $langName => $langId){
            $data = $datas[$langName];
            $ingredient->languages()->attach([
                [
                    'name' => $data['name'], 
                    'language_id'=>$langId
                ]
            ]);
        }

        return $ingredient;
    }

    /**
     * Update an ingredient by its ID.
     *
     * @param int $ingredient_id The ID of the ingredient to update
     * @param array $datas The data to update the ingredient
     * @return \App\Models\Ingredient The updated ingredient
     */
    public function update(int $ingredient_id, $datas){
        $ingredient = $this->ingredient_repo->find($ingredient_id);
        $ingredient->languages()->detach();
        $localeMappings = config('app.languages');

        foreach($localeMappings as $langName => $langId){
            $data = $datas[$langName];
            $ingredient->languages()->attach([
                [
                    'name' => $data['name'], 
                    'language_id'=>$langId
                ]
            ]);
        }

        return $ingredient;
    }
}
