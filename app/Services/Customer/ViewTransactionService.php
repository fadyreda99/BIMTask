<?php

namespace App\Services\Customer;

use App\Repositories\Transaction\TransactionRepository;

class ViewTransactionService
{
    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function viewTransaction($user_id)
    {
        $conditions = [
            ['payer', '=', $user_id],
        ];
        return $this->repository->get($conditions);
    }
}
