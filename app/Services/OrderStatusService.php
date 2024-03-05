<?php

namespace App\Services;
use App\Repositories\OrderStatusRepository;

class OrderStatusService
{
    public function __construct(
        OrderStatusRepository $order_status_repo
    ){
        $this->order_status_repo = $order_status_repo;
    }

    public function getAll(){
        return $this->order_status_repo->getAll();
    }
}
