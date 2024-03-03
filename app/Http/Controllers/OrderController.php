<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StateService;
use App\Services\BasketService;
use App\Services\PaymentMethodService;

class OrderController extends Controller
{
    public function __construct(
        StateService $state_serv,
        PaymentMethodService $payment_method_serv,
        BasketService $basket_serv
    ){
        $this->state_serv = $state_serv;
        $this->payment_method_serv = $payment_method_serv;
        $this->basket_serv = $basket_serv;
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
}
