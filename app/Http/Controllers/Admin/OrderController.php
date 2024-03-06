<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Services\OrderStatusService;
use App\Http\Requests\Admin\UpdateOrderStatusRequest;

class OrderController extends Controller
{
    public function __construct
    (
        OrderService $order_serv,
        OrderStatusService $order_status_serv
    ){
        $this->order_serv = $order_serv;
        $this->order_status_serv = $order_status_serv;
    }

    public function index(Request $request){
        $params = [];
        $params['end'] = 0;

        if($request->q){
            $params['q'] = $request->q;
        }

        if($request->segment(4) == 'archived'){
            $params['end'] = 1;
        }

        $orders = $this->order_serv->paginateAll($params);
        return view('admin.order.index',[
            'orders' => $orders
        ]);
    }

    public function show(int $id){
        $order = $this->order_serv->getOrderById($id);
        $order_statuses = $this->order_status_serv->getAll();

        return view('admin.order.show',[
            'order' => $order,
            'order_statuses' => $order_statuses
        ]);
    }

    public function updateStatus(int $id, UpdateOrderStatusRequest $request){
        $this->order_serv->updateStatus($id,$request->status);
        return redirect()->back();
    }
}
