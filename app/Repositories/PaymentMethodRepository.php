<?php

namespace App\Repositories;

use App\Models\PaymentMethod;

class PaymentMethodRepository {

    /**
     * Get all payment methods.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of payment methods
     */
    public function getAll(){
        return PaymentMethod::get();
    }
}
