<?php
namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\OrderStatusRepository;

class OrderService{

    public function __construct(
        OrderRepository $order_repo,
        OrderStatusRepository $order_status_repo,
        ){
        $this->order_repo = $order_repo;
        $this->order_status_repo = $order_status_repo;
    }

    /**
     * Get orders belonging to the authenticated user.
     *
     * @param int $ended Flag indicating whether to include ended orders (optional, default is 0)
     * @return \Illuminate\Database\Eloquent\Collection The collection of orders
     */
    public function getMy($ended = 0){
        return $this->order_repo->getByUserId(auth()->user()->id,$ended);
    }

    /**
     * Get an order by its ID.
     *
     * @param int $order_id The ID of the order
     * @return \App\Models\Order|null The found order or null if not found
     */
    public function getById(int $order_id){
        return $this->order_repo->getById($order_id);
    }

    /**
     * Get all orders.
     *
     * @param int $ended Flag indicating whether to include ended orders (optional, default is 0)
     * @return \Illuminate\Database\Eloquent\Collection The collection of orders
     */
    public function getAll($ended = 0){
        return $this->order_repo->getAll($ended);
    }

    /**
     * Paginate all orders.
     *
     * @param array $params Additional parameters for pagination (optional)
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated list of orders
     */
    public function paginateAll($params = []){
        return $this->order_repo->paginateAll($params);
    }

    /**
     * Get an order by its ID.
     *
     * @param int $order_id The ID of the order
     * @return \App\Models\Order|null The found order or null if not found
     */
    public function getOrderById(int $order_id){
        return $this->order_repo->getOrderById($order_id);
    }

    /**
     * Store a new order.
     *
     * @param array $datas The data to create the order
     * @return \App\Models\Order The created order
     */
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

    /**
     * Update the status of an order.
     *
     * @param int $order_id The ID of the order
     * @param int $status_id The ID of the status to update to
     * @return \App\Models\Order The updated order
     */
    public function updateStatus(int $order_id, int $status_id){
        $order = $this->order_repo->find($order_id);
        $latestStatus = $this->order_status_repo->getLatestStatus();
        $order->status = $status_id;

        if($latestStatus['id'] == $status_id){
            $order->ended = true;
        }

        $order->save();
        return $order;
    }
}
