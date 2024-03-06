<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repositories\BasketRepository;

class BasketService{

    /**
     * BasketService constructor.
     *
     * @param \App\Repositories\BasketRepository $basket_repo The repository for baskets
     */
    public function __construct(BasketRepository $basket_repo){
        $this->basket_repo = $basket_repo;
    }

    /**
     * Store a new basket or update an existing one.
     *
     * @param mixed $datas The data for the basket
     * @return \App\Models\Basket The created or updated basket instance
     */
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
            && count($old_basket->ingredients) == 0
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

    /**
     * Get baskets belonging to the authenticated user.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of baskets
     */
    public function getMy(){
        return $this->basket_repo->getMy(auth()->user()->id);
    }

    /**
     * Find a basket by its ID and user ID.
     *
     * @param int $id The ID of the basket
     * @return \App\Models\Basket|null The found basket or null if not found
     */
    public function findByIdAndUserId(int $id){
        return $this->basket_repo->findByIdAndUserId(auth()->user()->id,$id);
    }

    /**
     * Delete a basket by its ID.
     *
     * @param int $id The ID of the basket to delete
     * @return bool True if the basket is successfully deleted, false otherwise
     */
    public function destroy(int $id){
        $basket = $this->basket_repo->findByIdAndUserId(auth()->user()->id,$id);
        
        if(count($basket->ingredients)){
            $basket->ingredients()->detach();
        }

        return $basket->delete();  
    }
}
