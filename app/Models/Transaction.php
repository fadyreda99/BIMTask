<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount', 'payer', 'due_on', 'vat', 'is_vat_inclusive', 'status', 'amount_after_payments'
    ];

    protected $table = 'transactions';

    public function user()
    {
        return $this->belongsTo(User::class, 'payer', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'transaction_id', 'id');
    }
}
