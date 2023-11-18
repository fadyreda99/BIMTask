<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;

class TransactionRepository
{
    private $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create($request, $status)
    {
        $transaction = $this->model->create([
            'amount' => $request->amount,
            'payer' => $request->payer,
            'due_on' => $request->due_on,
            'vat' => $request->vat,
            'is_vat_inclusive' => $request->is_vat_inclusive,
            'status' => $status,
            'amount_after_payments' => $request->amount
        ]);
        return $transaction;
    }

    public function get($conditions = null, $col = null, $start = null, $end = null)
    {
        $query = $this->model->query();
        if ($conditions) {
            $query->where($conditions);
        }

        if ($col && $start && $end) {
            $query->whereBetween($col, [$start, $end]);
        }

        return $query->get();
    }
}
