<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;

class OrderRepository {

    /**
     * Store a new order.
     *
     * @param  string $name
     * @param  string $email
     * @param  string $phone_number
     * @param  string $address
     * @param  int $user_id
     * @param  int $state_id
     * @param  int $settlement_id
     * @param  int $payment_method_id
     * @param  mixed $notes
     * @return \App\Models\Order
     */
    public function store(
        string $name,
        string $email,
        string $phone_number,
        string $address,
        int $user_id,
        int $state_id,
        int $settlement_id,
        int $payment_method_id,
        $notes = null
    ) {
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

    /**
     * Get orders by user ID.
     *
     * @param  int $user_id
     * @param  mixed $ended
     * @return \Illuminate\Support\Collection
     */
    public function getByUserId(int $user_id, $ended = 0) {
        $orders = $this->retrieveOrderDetails($user_id, $ended);

        return $orders->get()
            ->groupBy('id')
            ->map(function ($group) {
                $order = $group->first();
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

    /**
     * Get all orders.
     *
     * @param  mixed $ended
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll($ended = 0) {
        return Order::where('ended', $ended)->get();
    }

    /**
     * Paginate all orders.
     *
     * @param  array $params
     * @param  int $paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateAll($params = [], $paginate = 10) {
        $ended = $params['end'];
        $order = Order::where('ended', $ended)
            ->orderBy('created_at', 'DESC');

        if (isset($params['q'])) {
            $order = $order->where('order_number', $params['q'])
                ->orWhere('order_number', 'like', '%' . $params['q'] . '%');
        }

        return $order->paginate($paginate);
    }

    /**
     * Get order by ID.
     *
     * @param  int $order_id
     * @return \App\Models\Order|null
     */
    public function getById(int $order_id) {
        return $this->retrieveOrderDetails(null, null, $order_id)->first();
    }

    /**
     * Get order by ID.
     *
     * @param  int $order_id
     * @return array|null
     */
    public function getOrderById($order_id) {
        $order = $this->retrieveOrderDetails(null, null, $order_id)->first();

        if (!$order) {
            return null;
        }

        $totalOrderProductsPrice = $order->total_price;

        $order_products = [
            [
                'product_id' => $order->product_id,
                'order_product_count' => $order->order_product_count,
                'product_price' => $order->product_price,
                'product_img_path' => $order->product_img_path,
                'total_price' => $order->total_price,
                'product_size_price' => $order->product_size_price,
                'order_product_size_name' => $order->order_product_size_name,
                'product_name' => $order->product_name,
                'ingredient_names' => $order->ingredient_names
            ]
        ];

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
    }

    /**
     * Find an order by ID.
     *
     * @param  int $order_id
     * @return \App\Models\Order|null
     */
    public function find(int $order_id) {
        return Order::find($order_id);
    }

    /**
     * Retrieve order details.
     *
     * @param  int|null $user_id
     * @param  int|null $ended
     * @param  int|null $order_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function retrieveOrderDetails($user_id = null, $ended = null, $order_id = null) {
        $locale = app()->getLocale();
        $localeMappings = config('app.languages');
        $l = $localeMappings[$locale];

        $query = Order::join('order_products', 'orders.id', '=', 'order_products.order_id');

        if ($user_id !== null) {
            $query->where('orders.user_id', $user_id);
        }

        if ($ended !== null) {
            $query->where('orders.ended', $ended);
        }

        if ($order_id !== null) {
            $query->where('orders.id', $order_id);
        }

        $query->orderBy('orders.created_at', 'DESC')
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
            );

        return $query;
    }
}
