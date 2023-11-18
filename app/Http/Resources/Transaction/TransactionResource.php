<?php

namespace App\Http\Resources\Transaction;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'payer' => new UserResource($this->whenLoaded('user')),
            'due_on' => $this->due_on,
            'vat' => $this->vat,
            'is_vat_inclusive' => $this->is_vat_inclusive,
            'status' => $this->status,
            'amount_after_payments' => $this->amount_after_payments
        ];
    }
}
