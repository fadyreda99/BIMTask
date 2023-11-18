<?php

namespace App\Http\Controllers\Customer\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionResource;
use App\Services\Customer\ViewTransactionService;

class ViewTransactionsController extends Controller
{
    private $viewTransactionService;
    public function __construct(ViewTransactionService $viewTransactionService)
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserRole:customer');
        $this->middleware('checkUserPermission:view transactions');
        $this->viewTransactionService = $viewTransactionService;
    }

    public function viewTransaction()
    {
        $user_id  = auth()->user()->id;
        $transactions = $this->viewTransactionService->viewTransaction($user_id);
        return TransactionResource::collection($transactions);
    }
}
