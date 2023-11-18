<?php

namespace App\Services\Transaction;

use App\Repositories\Transaction\TransactionRepository;

class AllTransactionService
{

    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}
