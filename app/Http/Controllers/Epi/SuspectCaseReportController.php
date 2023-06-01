<?php

namespace App\Http\Controllers\Epi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use App\Models\Epi\SuspectCase;

class SuspectCaseReportController extends Controller
{
    //
    public function chagasRequest(Request $request)
    {
        $organizations = Organization::whereIn('id', Auth::user()->practitioners->pluck('organization_id'))
            ->orderBy('alias')
            ->get();

        $selectedOrganization = null;

        $organization_id = 0;

        $reportData_request = [];

        $reportData_sample = [];

        $reportData_confirmation = [];

        if ($request->has('organization')) {
            $selectedOrganization = Organization::find($request->organization);
            $organization_id = $selectedOrganization->id;
            $reportData_request = SuspectCase::where('organization_id', $organization_id)
                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
                ->whereNotNull('request_at')
                ->groupBy('year', 'month')
                ->get()
                ->toArray();

            $reportData_sample = SuspectCase::where('organization_id', $organization_id)
                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
                ->whereNotNull('sample_at')
                ->groupBy('year', 'month')
                ->get()
                ->toArray();
            
        }

        return view('chagas.reports.reception', compact('organizations', 'selectedOrganization', 'organization_id', 'reportData_request', 'reportData_sample'));
    }
}
