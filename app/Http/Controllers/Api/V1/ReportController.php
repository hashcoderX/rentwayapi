<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Payment;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Reports", description="Reporting endpoints")
 */
class ReportController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/reports/summary",
     *   tags={"Reports"},
     *   security={{"bearerAuth":{}}},
     *   summary="Financial summary",
     *   @OA\Parameter(name="company_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="month", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="year", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function summary(Request $request)
    {
        $companyId = $request->get('company_id') ?? (Auth::user()->company_id ?? null);

        $paymentsQuery = Payment::query();
        $expensesQuery = Expenses::query();

        if ($companyId) {
            $paymentsQuery->where('company_id', $companyId);
            $expensesQuery->where('company_id', $companyId);
        }

        if ($month = $request->get('month')) {
            $paymentsQuery->where('month', $month);
            $expensesQuery->whereMonth('date_time', $month);
        }

        if ($year = $request->get('year')) {
            $paymentsQuery->whereYear('date_time', $year);
            $expensesQuery->whereYear('date_time', $year);
        }

        $totalIncome = (float) $paymentsQuery->sum('amount');
        $totalExpenses = (float) $expensesQuery->sum('amount');
        $profit = $totalIncome - $totalExpenses;

        return $this->success('Financial summary fetched successfully', [
            'filters' => [
                'company_id' => $companyId,
                'month' => $month ?? null,
                'year' => $year ?? null,
            ],
            'totals' => [
                'income' => $totalIncome,
                'expenses' => $totalExpenses,
                'profit' => $profit,
            ],
        ]);
    }
}
