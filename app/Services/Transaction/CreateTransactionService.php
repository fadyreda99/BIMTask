<?php

namespace App\Services\Transaction;

use App\Repositories\Transaction\TransactionRepository;
use Carbon\Carbon;

class CreateTransactionService
{

    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $status = '';
        $currentDate = Carbon::now();
        $toDate = Carbon::parse($request->input('due_on'));

        if ($currentDate->isBefore($toDate)) {
            $status = 'Outstanding';
        } else {
            $status = 'Overdue';
        }
        return $this->repository->create($request, $status);
    }
}
