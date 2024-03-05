<?php

namespace App\Repositories;
use App\Models\Basket;
use Illuminate\Support\Facades\DB;

class BasketRepository{

    public function findByIdAndUserId(int $user_id,int $id){
        return Basket::where('user_id',$user_id)
        ->where('id',$id)->first();
    }

    public function store(int $product_id, int $count, int $user_id, $size_id = null){
        return Basket::create([
            'product_id' => $product_id,
            'count' => $count,
            'user_id' => $user_id,
            'size_id' => $size_id,
        ]);
    }

    public function findWithAllParams(int $product_id, int $user_id, $size_id = null){

        $basket = Basket::where('product_id',$product_id)
        ->where('user_id',$user_id);

        if($size_id){
            $basket = $basket->where('size_id',$size_id);
        }

        return $basket->first();
    }

    public function updateCount(Basket $basket, int $count){
        $basket->count = intval($basket->count) + intval($count);
        $basket->save();
        return $basket;
    }

    public function getMy(int $user_id){
    // return Basket::where('user_id',$user_id)
    //     ->with(['product' => function ($q) {
    //         return $q->with(['sizes' => function ($q) {
    //             return $q->select('id','name','price','size_id');
    //         }]);
    //     }])
    //     ->get();
    $locale = app()->getLocale();
        $localeMappings = config('app.languages');
        $l = $localeMappings[$locale];

        return Basket::join('products', 'baskets.product_id', '=', 'products.id')
    ->leftJoin('product_size', function($join) {
        $join->on('products.id', '=', 'product_size.product_id')
            ->whereColumn('product_size.size_id', '=', 'baskets.size_id');
    })
    ->leftJoin('basket_ingredient', function($join) use ($l) {
        $join->on('baskets.id', '=', 'basket_ingredient.basket_id');
            // ->where('basket_ingredient.language_id', $l);
    })
    ->join('languageables as product_language', 'products.id', '=', 'product_language.languageable_id')
    ->leftJoin('sizes', 'baskets.size_id', '=', 'sizes.id')
    ->leftJoin('languageables as ingredient_language', function($join) use ($l) {
        $join->on('basket_ingredient.ingredient_id', '=', 'ingredient_language.languageable_id')
            ->where('ingredient_language.language_id', $l)
            ->where('ingredient_language.languageable_type', 'App\Models\Ingredient');
    })
    ->where('baskets.user_id', $user_id)
    ->where('product_language.languageable_type', 'App\Models\Product')
    ->where('product_language.language_id', $l)
    ->select(
        'baskets.count as basket_count',
        'baskets.id as basket_id',
        'products.price as product_price',
        'products.img_path as product_img_path',
        DB::raw('SUM(CASE WHEN products.price != 0 THEN baskets.count * products.price ELSE baskets.count * IFNULL(product_size.price, 0) END) as total_price'),
        DB::raw('IFNULL(product_size.price, 0) as product_size_price'),
        'sizes.name as basket_size_name',
        'product_language.name as product_name',
        DB::raw('GROUP_CONCAT(ingredient_language.name) as ingredient_names')
    )
    ->groupBy(
        'baskets.id',
        'products.price',
        'products.img_path',
        'product_size.price',
        'sizes.name',
        'product_language.name'
    )
    ->get();




     }
}
