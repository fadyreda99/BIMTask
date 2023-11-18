<?php

namespace App\Services\Transaction;

use App\Repositories\Transaction\TransactionRepository;

class ViewTransactionUserService
{
    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function userTransactions($user_id)
    {
        $conditions = [
            ['payer', '=', $user_id],
        ];
        return $this->repository->get($conditions);
    }
}
