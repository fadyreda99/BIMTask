<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\CreateTransactionRequest;
use App\Http\Resources\Transaction\TransactionResource;
use App\Services\Transaction\CreateTransactionService;

class CreateTransactionController extends Controller
{
    private $createTransactionService;
    public function __construct(CreateTransactionService $createTransactionService)
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserRole:admin');
        $this->createTransactionService = $createTransactionService;
    }

    public function create(CreateTransactionRequest $request)
    {
        $transaction = $this->createTransactionService->create($request);
        return new TransactionResource($transaction->load('user'));
    }
}
