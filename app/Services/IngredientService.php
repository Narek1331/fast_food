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

    public function paginateAll(int $paginate = 5){
        return $this->ingredient_repo->getAllWithLanguages($paginate);
    }

    public function findOrFailById(int $ingredient_id){
        return $this->ingredient_repo->findOrFailById($ingredient_id);
    }

    public function findWithAllLanguages(int $ingredient_id){
        return $this->ingredient_repo->findWithAllLanguages($ingredient_id);
    }

    public function destroy(int $ingredient_id){
        return $this->ingredient_repo->destroy($ingredient_id);
    }

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
