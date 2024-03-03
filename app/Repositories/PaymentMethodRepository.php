<?php

namespace App\Repositories;

use App\Models\PaymentMethod;

class PaymentMethodRepository {

    public function getAll(){
        return PaymentMethod::get();
    }
}
