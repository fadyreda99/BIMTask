<?php

namespace App\Services\Reports;

use App\Repositories\Transaction\TransactionRepository;

class GenerateReportsService
{

    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function generate($request)
    {
        if ($request->start_date && $request->end_date) {
            $col = 'created_at';
            $start = $request->start_date;
            $end = $request->end_date;
            $reports = $this->repository->get(null, $col, $start, $end);
        } else {
            $reports = $this->repository->getAll();
        }

        $result = [];

        foreach ($reports as $report) {
            $monthYear = date('n-Y', strtotime($report->created_at));

            if (!isset($result[$monthYear])) {
                $result[$monthYear] = [
                    'month' => date('n', strtotime($report->created_at)),
                    'year' => date('Y', strtotime($report->created_at)),
                    'paid' => 0,
                    'outstanding' => 0,
                    'overdue' => 0,
                ];
            }

            if ($report->status == 'paid' && $report->amount_after_payments == 0) {
                $result[$monthYear]['paid'] += $report->amount;
            } elseif ($report->status == 'Outstanding' && $report->amount_after_payments != 0) {
                $result[$monthYear]['outstanding'] += $report->amount_after_payments;
            } elseif ($report->status == 'Overdue' && $report->amount_after_payments != 0) {
                $result[$monthYear]['overdue'] += $report->amount_after_payments;
            }
        }
        $response = array_values($result);

        return $response;
    }
}
