<?php

namespace App\Services;

use App\Repositories\PaymentMethodRepository;

class PaymentMethodService
{
    /**
     * @var PaymentMethodRepository The payment method repository instance
     */
    protected $payment_method_repo;

    /**
     * PaymentMethodService constructor.
     *
     * @param PaymentMethodRepository $payment_method_repo The payment method repository instance
     */
    public function __construct(PaymentMethodRepository $payment_method_repo)
    {
        $this->payment_method_repo = $payment_method_repo;
    }

    /**
     * Get all payment methods.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of payment methods
     */
    public function getAll()
    {
        return $this->payment_method_repo->getAll();
    }
}
