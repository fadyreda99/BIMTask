<?php

namespace App\Providers;

use App\Models\Payment;
use App\Models\Transaction;
use App\Repositories\Payment\PaymentRepository;
use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TransactionRepository::class, function ($app) {
            return new TransactionRepository($app->make(Transaction::class));
        });
        $this->app->bind(PaymentRepository::class, function ($app) {
            return new PaymentRepository($app->make(Payment::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
