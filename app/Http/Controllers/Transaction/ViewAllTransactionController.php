<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionResource;
use App\Services\Transaction\AllTransactionService;

class ViewAllTransactionController extends Controller
{
    private $allTransactionService;
    
    public function __construct(AllTransactionService $allTransactionService)
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserRole:admin');
        $this->allTransactionService = $allTransactionService;
    }

    public function getAll()
    {
        $transactions = $this->allTransactionService->getAll();
        return TransactionResource::collection($transactions->load('user'));
    }
}
