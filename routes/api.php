<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Customer\Transaction\ViewTransactionsController;
use App\Http\Controllers\Payment\RecordPaymentController;
use App\Http\Controllers\Reports\GenerateReportsController;
use App\Http\Controllers\Transaction\CreateTransactionController;
use App\Http\Controllers\Transaction\ViewAllTransactionController;
use App\Http\Controllers\Transaction\ViewUserTransactionController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LogoutController::class, 'logout']);
});

Route::group([
    'prefix' => 'transaction'
], function () {
    Route::post('create', [CreateTransactionController::class, 'create']);
    Route::get('all', [ViewAllTransactionController::class, 'getAll']);
    Route::get('user-transaction/{user_id}', [ViewUserTransactionController::class, 'userTransaction']);
});

Route::group([
    'prefix' => 'payment'
], function () {
    Route::post('record', [RecordPaymentController::class, 'recordPayment']);
});

Route::group([
    'prefix' => 'report'
], function () {
    Route::get('generate', [GenerateReportsController::class, 'generateReports']);
});

Route::group([
    'prefix' => 'customer/tranactions'
], function () {
    Route::get('all', [ViewTransactionsController::class, 'viewTransaction']);
});
