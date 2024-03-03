<?php

namespace App\Services;
use App\Repositories\PaymentMethodRepository;

class PaymentMethodService
{
    public function __construct(
        PaymentMethodRepository $payment_method_repo
    ){
        $this->payment_method_repo = $payment_method_repo;
    }

    public function getAll(){
        return $this->payment_method_repo->getAll();
    }
}
