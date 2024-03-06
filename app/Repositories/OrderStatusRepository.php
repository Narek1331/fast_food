<?php

namespace App\Repositories;

use App\Models\OrderStatus;

class OrderStatusRepository {

    public function getAll(){
        return OrderStatus::orderBy('sequence','asc')->get();
    }

    public function getLatestStatus(){
        return OrderStatus::orderBy('sequence', 'desc')->first();
    }
}
