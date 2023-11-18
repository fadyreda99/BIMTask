<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateTransactionStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-transaction-status-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->toDateString();

        $transactions = Transaction::where('status', 'Outstanding')
        ->whereDate('due_on', '<', $today)
        ->get();

        Log::info($transactions);
        foreach($transactions as $transaction){
            $transaction->update(['status'=>'Overdue']);
        }
        
    }
}
