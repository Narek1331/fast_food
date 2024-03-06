<?php

namespace App\Repositories;

use App\Models\OrderStatus;

class OrderStatusRepository {

    /**
     * Get all order statuses sorted by sequence in ascending order.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of order statuses
     */
    public function getAll(){
        return OrderStatus::orderBy('sequence','asc')->get();
    }

    /**
     * Get the latest order status based on the sequence.
     *
     * @return \App\Models\OrderStatus|null The latest order status or null if not found
     */
    public function getLatestStatus(){
        return OrderStatus::orderBy('sequence', 'desc')->first();
    }
}
