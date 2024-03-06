<?php

namespace App\Services;

use App\Repositories\OrderStatusRepository;

class OrderStatusService
{
    /**
     * @var OrderStatusRepository The order status repository instance
     */
    protected $order_status_repo;

    /**
     * OrderStatusService constructor.
     *
     * @param OrderStatusRepository $order_status_repo The order status repository instance
     */
    public function __construct(OrderStatusRepository $order_status_repo)
    {
        $this->order_status_repo = $order_status_repo;
    }

    /**
     * Get all order statuses.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of order statuses
     */
    public function getAll()
    {
        return $this->order_status_repo->getAll();
    }
}
