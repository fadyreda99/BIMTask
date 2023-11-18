<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionResource;
use App\Services\Transaction\ViewTransactionUserService;
use Illuminate\Support\Facades\Validator;

class ViewUserTransactionController extends Controller
{
    private $viewTransactionUserService;

    public function __construct(ViewTransactionUserService $viewTransactionUserService)
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserRole:admin');
        $this->viewTransactionUserService = $viewTransactionUserService;
    }

    public function userTransaction($user_id)
    {
        $validator = Validator::make(['user_id' => $user_id], [
            'user_id' => 'exists:users,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => 'user not found'], 404);
        }

        $transactions = $this->viewTransactionUserService->userTransactions($user_id);
        return TransactionResource::collection($transactions);
    }
}
