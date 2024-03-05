<?php

namespace App\Repositories;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;

class OrderRepository{

    public function store(
        string $name,
        string $email,
        string $phone_number,
        string $address,
        int $user_id,
        int $state_id,
        int $settlement_id,
        int $payment_method_id,
        $notes = null,
        )
    {
        return Order::create([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
            'address' => $address,
            'user_id' => $user_id,
            'state_id' => $state_id,
            'settlement_id' => $settlement_id,
            'payment_method_id' => $payment_method_id,
            'notes' => $notes
        ]);
    }

    // public function getByUserId(int $user_id){
    //     // return Order::where('user_id',$user_id)->get();

    //     $locale = app()->getLocale();
    //     $localeMappings = config('app.languages');
    //     $l = $localeMappings[$locale];

    //     return OrderProduct::join('products', 'order_products.product_id', '=', 'products.id')
    //         ->leftJoin('product_size', function($join) {
    //             $join->on('products.id', '=', 'product_size.product_id')
    //                 ->whereColumn('product_size.size_id', '=', 'order_products.size_id');
    //         })
    //         ->leftJoin('order_product_ingredient', function($join) use ($l) {
    //             $join->on('order_products.id', '=', 'order_product_ingredient.order_product_id');
    //                 // ->where('basket_ingredient.language_id', $l);
    //         })
    //         ->join('languageables as product_language', 'products.id', '=', 'product_language.languageable_id')
    //         ->leftJoin('sizes', 'order_products.size_id', '=', 'sizes.id')
    //         ->leftJoin('languageables as ingredient_language', function($join) use ($l) {
    //             $join->on('order_product_ingredient.ingredient_id', '=', 'ingredient_language.languageable_id')
    //                 ->where('ingredient_language.language_id', $l)
    //                 ->where('ingredient_language.languageable_type', 'App\Models\Ingredient');
    //         })
    //         // ->where('order_products.user_id', $user_id)
    //         ->where('product_language.languageable_type', 'App\Models\Product')
    //         ->where('product_language.language_id', $l)
    //         ->select(
    //             'order_products.count as order_product_count',
    //             'order_products.id as order_product_id',
    //             'products.price as product_price',
    //             'products.img_path as product_img_path',
    //             DB::raw('SUM(CASE WHEN products.price != 0 THEN order_products.count * products.price ELSE order_products.count * IFNULL(product_size.price, 0) END) as total_price'),
    //             DB::raw('IFNULL(product_size.price, 0) as product_size_price'),
    //             'sizes.name as order_product_size_name',
    //             'product_language.name as product_name',
    //             DB::raw('GROUP_CONCAT(ingredient_language.name) as ingredient_names')
    //         )
    //         ->groupBy(
    //             'order_products.id',
    //             'products.price',
    //             'products.img_path',
    //             'product_size.price',
    //             'sizes.name',
    //             'product_language.name'
    //         )
    //         ->groupBy('order_products.order_id') // Grouping by order_id
    //         ->get();
    // }

    // public function getByUserId(int $user_id){
    //     $locale = app()->getLocale();
    //     $localeMappings = config('app.languages');
    //     $l = $localeMappings[$locale];
    //     return Order::join('order_products','orders.id','=','order_products.order_id')
    //     ->where('orders.user_id',$user_id)
    //     ->join('products', 'order_products.product_id', '=', 'products.id')
    //     ->leftJoin('product_size', function($join) {
    //         $join->on('products.id', '=', 'product_size.product_id')
    //             ->whereColumn('product_size.size_id', '=', 'order_products.size_id');
    //     })
    //     ->leftJoin('order_product_ingredient', function($join) use ($l) {
    //         $join->on('order_products.id', '=', 'order_product_ingredient.order_product_id');
    //             // ->where('basket_ingredient.language_id', $l);
    //     })
    //     ->join('languageables as product_language', 'products.id', '=', 'product_language.languageable_id')
    //     ->leftJoin('sizes', 'order_products.size_id', '=', 'sizes.id')
    //     ->leftJoin('languageables as ingredient_language', function($join) use ($l) {
    //         $join->on('order_product_ingredient.ingredient_id', '=', 'ingredient_language.languageable_id')
    //             ->where('ingredient_language.language_id', $l)
    //             ->where('ingredient_language.languageable_type', 'App\Models\Ingredient');
    //     })
    //     // ->where('order_products.user_id', $user_id)
    //     ->where('product_language.languageable_type', 'App\Models\Product')
    //     ->where('product_language.language_id', $l)
    //     ->select(
    //         'orders.name as order_name',
    //         'orders.id as order_id',
    //         'order_products.count as order_product_count',
    //         'order_products.id as order_product_id',
    //         'products.price as product_price',
    //         'products.img_path as product_img_path',
    //         DB::raw('SUM(CASE WHEN products.price != 0 THEN order_products.count * products.price ELSE order_products.count * IFNULL(product_size.price, 0) END) as total_price'),
    //         DB::raw('IFNULL(product_size.price, 0) as product_size_price'),
    //         'sizes.name as order_product_size_name',
    //         'product_language.name as product_name',
    //         DB::raw('GROUP_CONCAT(ingredient_language.name) as ingredient_names')
    //     )
    //     ->groupBy(
    //         'order_products.id',
    //         'products.price',
    //         'products.img_path',
    //         'product_size.price',
    //         'sizes.name',
    //         'product_language.name',
    //         'orders.id',
    //         'orders.user_id',
    //     )
    //     ->get();
    // }

    public function getByUserId(int $user_id,$ended = 0)
{
    $locale = app()->getLocale();
    $localeMappings = config('app.languages');
    $l = $localeMappings[$locale];

    return Order::join('order_products', 'orders.id', '=', 'order_products.order_id')
        ->where('orders.user_id', $user_id)
        ->where('orders.ended', $ended)
        ->orderBy('orders.created_at', 'DESC')
        ->join('products', 'order_products.product_id', '=', 'products.id')
        ->leftJoin('product_size', function ($join) {
            $join->on('products.id', '=', 'product_size.product_id')
                ->whereColumn('product_size.size_id', '=', 'order_products.size_id');
        })
        ->leftJoin('states', function ($join) {
            $join->on('orders.state_id', '=', 'states.id');
        })
        ->leftJoin('settlements', function ($join) {
            $join->on('orders.settlement_id', '=', 'settlements.id');
        })
        ->leftJoin('order_product_ingredient', 'order_products.id', '=', 'order_product_ingredient.order_product_id')
        ->join('languageables as product_language', function ($join) use ($l) {
            $join->on('products.id', '=', 'product_language.languageable_id')
                ->where('product_language.language_id', $l)
                ->where('product_language.languageable_type', 'App\Models\Product');
        })
        ->leftJoin('payment_methods', 'orders.payment_method_id', '=', 'payment_methods.id')
        ->join('languageables as payment_method_language', function ($join) use ($l) {
            $join->on('orders.payment_method_id', '=', 'payment_method_language.languageable_id')
                ->where('payment_method_language.language_id', $l)
                ->where('payment_method_language.languageable_type', 'App\Models\PaymentMethod');
        })
        ->leftJoin('sizes', 'order_products.size_id', '=', 'sizes.id')
        ->leftJoin('languageables as ingredient_language', function ($join) use ($l) {
            $join->on('order_product_ingredient.ingredient_id', '=', 'ingredient_language.languageable_id')
                ->where('ingredient_language.language_id', $l)
                ->where('ingredient_language.languageable_type', 'App\Models\Ingredient');
        })
        ->select(
            'states.name as state_name',
            'settlements.name as settlement_name',
            'payment_method_language.name as payment_method_name',
            'orders.*', 
            'products.id as product_id',
            'order_products.count as order_product_count',
            'products.price as product_price',
            'products.img_path as product_img_path',
            DB::raw('SUM(CASE WHEN products.price != 0 THEN order_products.count * products.price ELSE order_products.count * IFNULL(product_size.price, 0) END) as total_price'),
            DB::raw('IFNULL(product_size.price, 0) as product_size_price'),
            'sizes.name as order_product_size_name',
            'product_language.name as product_name',
            DB::raw('GROUP_CONCAT(ingredient_language.name) as ingredient_names')
        )
        ->groupBy(
            'orders.id',
            'order_products.id',
            'products.id',
            'products.price',
            'products.img_path',
            'product_size.price',
            'sizes.name',
            'product_language.name',
            'states.name',
            'settlements.name',
            'payment_method_name'
        )
        ->get()
        ->groupBy('id') // Grouping by order_id to form the structure you desire
        ->map(function ($group) {
            $order = $group->first(); // Retrieve the order details from the group
            $totalOrderProductsPrice = $group->sum('total_price');

            $order_products = $group->map(function ($item) {
                return [
                    'product_id' => $item->product_id,
                    'order_product_count' => $item->order_product_count,
                    'product_price' => $item->product_price,
                    'product_img_path' => $item->product_img_path,
                    'total_price' => $item->total_price,
                    'product_size_price' => $item->product_size_price,
                    'order_product_size_name' => $item->order_product_size_name,
                    'product_name' => $item->product_name,
                    'ingredient_names' => $item->ingredient_names
                ];
            });
    
            return [
                'order' => [
                    'id' => $order->id,
                    'name' => $order->name,
                    'email' => $order->email,
                    'phone_number' => $order->phone_number,
                    'address' => $order->address,
                    'payed' => $order->payed,
                    'ended' => $order->ended,
                    'order_number' => $order->order_number,
                    'status' => $order->status,
                    'notes' => $order->notes,
                    'state' => $order->state_name, 
                    'settlement' => $order->settlement_name, 
                    'payment_method_name' => $order->payment_method_name, 
                    'total_order_products_price' => $totalOrderProductsPrice,
                    'date' => $order->created_at,
                ],
                'order_products' => $order_products
            ];
        });
}

    


}
