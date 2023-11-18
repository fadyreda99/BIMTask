<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordPaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'transaction' => $this->transaction_id,
            'amount' => $this->amount,
            'paid_on' => $this->paid_on,
            'details' => $this->details
        ];
    }
}
