<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Services\Reports\GenerateReportsService;
use Illuminate\Http\Request;

class GenerateReportsController extends Controller
{
    private $generateReportsService;

    public function __construct(GenerateReportsService $generateReportsService)
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserRole:admin');
        $this->generateReportsService = $generateReportsService;
    }

    public function generateReports(Request $request)
    {
        return $this->generateReportsService->generate($request);
    }
}
