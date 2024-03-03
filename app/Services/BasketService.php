<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repositories\BasketRepository;

class BasketService{

    public function __construct(BasketRepository $basket_repo){
        $this->basket_repo = $basket_repo;
    }

    public function store(mixed $datas)
    {
        $old_basket = $this->basket_repo->findWithAllParams(
            $datas['product_id'],
            auth()->user()->id,
            $datas['size_id'] ?? null,
        );

        if(isset($old_basket->ingredients)){
            $old_basket_ingredients = $old_basket->ingredients()->pluck('id')->toArray();
            $datas_ingredients = $datas['ingredients'] ?? null;
        }

        if(
            $old_basket
            && isset($datas['ingredients'])
            && empty(array_diff($old_basket_ingredients, $datas_ingredients))
            && empty(array_diff($old_basket_ingredients, $datas_ingredients))
        ){
            return $this->basket_repo->updateCount($old_basket,$datas['count']);
        }else if (
            $old_basket
            && !isset($datas['ingredients'])
        ){
            return $this->basket_repo->updateCount($old_basket,$datas['count']);
        }

        $basket = $this->basket_repo->store(
            $datas['product_id'],
            $datas['count'],
            auth()->user()->id,
            $datas['size_id'] ?? null,
        );

        if(isset($datas['ingredients'])){
            foreach($datas['ingredients'] as $ingredient){
                $basket->ingredients()->attach($ingredient);
            }
        }


        return $basket;
    }

    public function getMy(){
        return $this->basket_repo->getMy(auth()->user()->id);
    }

    public function findByIdAndUserId(int $id){
        return $this->basket_repo->findByIdAndUserId(auth()->user()->id,$id);
    }

    public function destroy(int $id){
        $basket = $this->basket_repo->findByIdAndUserId(auth()->user()->id,$id);
        
        if(count($basket->ingredients)){
            $basket->ingredients()->detach();
        }

        return $basket->delete();
        
    }

}
