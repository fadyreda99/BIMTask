<?php

namespace App\Traits;

use App\Models\Transaction;

trait UpdateTransactionsTrait
{
    public function updateTransaction($transaction_id, $amount)
    {
        $updatedStatus = '';
        $transaction = Transaction::whereId($transaction_id)->first();
        if ($transaction->amount_after_payments == $amount || $transaction->amount_after_payments <= $amount) {
            $updatedStatus = 'paid';
        } else {
            $updatedStatus = 'Outstanding';
        }
        $amount_after_payment = $transaction->amount_after_payments - $amount;

        $transaction->update([
            'amount_after_payments' =>  $amount_after_payment,
            'status' => $updatedStatus
        ]);
    }
}
