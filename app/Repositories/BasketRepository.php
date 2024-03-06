<?php

namespace App\Repositories;

use App\Models\Basket;
use Illuminate\Support\Facades\DB;

class BasketRepository {
    
    /**
     * Find a basket by its ID and user ID.
     *
     * @param int $user_id The user ID
     * @param int $id The basket ID
     * @return \App\Models\Basket|null The found basket or null if not found
     */
    public function findByIdAndUserId(int $user_id, int $id) {
        return Basket::where('user_id', $user_id)
            ->where('id', $id)
            ->first();
    }

    /**
     * Store a new basket record.
     *
     * @param int $product_id The product ID
     * @param int $count The count of products
     * @param int $user_id The user ID
     * @param int|null $size_id The size ID (optional)
     * @return \App\Models\Basket The created basket
     */
    public function store(int $product_id, int $count, int $user_id, $size_id = null) {
        return Basket::create([
            'product_id' => $product_id,
            'count' => $count,
            'user_id' => $user_id,
            'size_id' => $size_id,
        ]);
    }

    /**
     * Find a basket with all specified parameters.
     *
     * @param int $product_id The product ID
     * @param int $user_id The user ID
     * @param int|null $size_id The size ID (optional)
     * @return \App\Models\Basket|null The found basket or null if not found
     */
    public function findWithAllParams(int $product_id, int $user_id, $size_id = null) {
        $basket = Basket::where('product_id', $product_id)
            ->where('user_id', $user_id);

        if ($size_id) {
            $basket->where('size_id', $size_id);
        }

        return $basket->first();
    }

    /**
     * Update the count of a basket.
     *
     * @param \App\Models\Basket $basket The basket to update
     * @param int $count The new count
     * @return \App\Models\Basket The updated basket
     */
    public function updateCount(Basket $basket, int $count) {
        $basket->count = intval($basket->count) + intval($count);
        $basket->save();
        return $basket;
    }

    /**
     * Get baskets belonging to a specific user.
     *
     * @param int $user_id The user ID
     * @return \Illuminate\Database\Eloquent\Collection The collection of baskets
     */
    public function getMy(int $user_id) {
        // Your query to fetch baskets
    }
}
