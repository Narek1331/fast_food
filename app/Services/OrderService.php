<?php
namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService{

    public function __construct(OrderRepository $order_repo){
        $this->order_repo = $order_repo;
    }

    public function getMy($status = 0){
        return $this->order_repo->getByUserId(auth()->user()->id,$status);
    }

    public function store($datas){
        $order = $this->order_repo->store(
                $datas['name'],
                $datas['email'],
                $datas['phone_number'],
                $datas['address'],
                auth()->user()->id,
                $datas['state'],
                $datas['settlement'],
                $datas['payment_method'],
                $datas['notes'] ?? null
        );
        $baskets = auth()->user()->baskets;
        foreach($baskets as $basket){
            $order_product = $order->products()->create([
                "order_id" => $order->id,
                "product_id" => $basket->product_id,
                "size_id" => $basket->size_id,
                "count" => $basket->count
            ]);

            foreach($basket->ingredients as $ing){
                $order_product->ingredients()->attach([
                    [
                        'order_product_id' => $order_product['id'],
                        'ingredient_id' => $ing['pivot']['ingredient_id']
                    ]
                ]);
            }
        }

        auth()->user()->baskets()->delete();

        return $order;
    }
}
