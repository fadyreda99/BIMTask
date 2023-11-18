<?php

namespace App\Services\Payment;

use App\Repositories\Payment\PaymentRepository;
use App\Traits\UpdateTransactionsTrait;

class RecordPaymentService
{
    use UpdateTransactionsTrait;

    protected $repository;

    public function __construct(PaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function recordPayment($request)
    {
        $payment = $this->repository->create($request);
        $this->updateTransaction($request->transaction_id, $request->amount);
        return $payment;
    }
}
