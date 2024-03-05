<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StateService;
use App\Services\BasketService;
use App\Services\PaymentMethodService;
use App\Services\OrderStatusService;
use App\Services\OrderService;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    public function __construct(
        StateService $state_serv,
        PaymentMethodService $payment_method_serv,
        BasketService $basket_serv,
        OrderService $order_serv,
        OrderStatusService $order_status_serv,
    ){
        $this->state_serv = $state_serv;
        $this->payment_method_serv = $payment_method_serv;
        $this->basket_serv = $basket_serv;
        $this->order_serv = $order_serv;
        $this->order_status_serv = $order_status_serv;
    }

    public function index(){
        $states = $this->state_serv->getAll();
        $paymentMethods = $this->payment_method_serv->getAll();
        $baskets = $this->basket_serv->getMy();

        return view('main.order.index',[
            'states'=>$states,
            'payment_methods'=>$paymentMethods,
            'baskets'=>$baskets,
        ]);
    }

    public function store(StoreOrderRequest $request){
        $order = $this->order_serv->store($request->validated());
        return redirect()->route('order.my', ['locale' => app()->getLocale()])->with('message', trans('messages.order_stored_successfully'));
    }

    public function my(Request $request){
        $status = 0;
        if ($request->has('archived') && $request->archived == 1) {
            $status = 1;
        }
        $orders = $this->order_serv->getMy($status);

        $order_statuses = $this->order_status_serv->getAll();
        return view('main.order.my.index',[
            'orders' => $orders,
            'order_statuses' => $order_statuses
        ]);
    }
}
