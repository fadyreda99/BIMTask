<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\RecordPaymentRequest;
use App\Http\Resources\Payment\RecordPaymentResource;
use App\Services\Payment\RecordPaymentService;

class RecordPaymentController extends Controller
{
    private $recordPaymentService;

    public function __construct(RecordPaymentService $recordPaymentService)
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserRole:admin');
        $this->recordPaymentService = $recordPaymentService;
    }

    public function recordPayment(RecordPaymentRequest $request)
    {
        $payment = $this->recordPaymentService->recordPayment($request);
        return new RecordPaymentResource($payment);
    }
}
