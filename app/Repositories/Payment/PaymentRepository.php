<?php

namespace App\Repositories\Payment;

use App\Models\Payment;

class PaymentRepository
{
    private $model;
    
    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

    public function create($request)
    {
        return $this->model->create($request->all());
    }
}
