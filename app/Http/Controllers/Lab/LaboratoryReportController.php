<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Epi\SuspectCase;

class LaboratoryReportController extends Controller
{
    public function receptionByDate(Request $request)
    {
        $reportData = SuspectCase::selectRaw('YEAR(reception_at) as year, MONTH(reception_at) as month, COUNT(*) as count')
            ->whereNotNull('reception_at')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $consolidatedData = $reportData->groupBy('year')->map(function ($yearData) {
            return $yearData->sum('count');
        });

        return view('labs.reports.reception', compact('reportData', 'consolidatedData'));
    }

    public function averageTime(Request $request)
    {
        $averageTime = SuspectCase::selectRaw('SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND, reception_at, chagas_result_confirmation_at))) as average_time')
            ->whereNotNull('reception_at')
            ->whereNotNull('chagas_result_confirmation_at')
            ->first();

        return view('labs.reports.average_time', compact('averageTime'));
    }
}
