<?php

namespace App\Http\Controllers;

use App\Models\Temple;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function report_day(Request $request)
    {
        $date = $request->report_date ? Carbon::parse($request->report_date) : today();
        
        $temples = Temple::whereDate('created_at', $date)->get();

        $totalTemples = $temples->count();
        $northTemples = $temples->where('sector', 'วัดภาคเหนือ')->count();
        $centralTemples = $temples->where('sector', 'วัดภาคกลาง')->count();
        $eastTemples = $temples->where('sector', 'วัดภาคตะวันออก')->count();
        $southTemples = $temples->where('sector', 'วัดภาคใต้')->count();

        return view('report.report_day', compact(
            'totalTemples',
            'northTemples',
            'centralTemples',
            'eastTemples',
            'southTemples'
        ));
    }

    public function report_month(Request $request)
    {
        $date = $request->report_month ?? now()->format('Y-m');

        $temples = Temple::whereYear('created_at', substr($date, 0, 4))
                        ->whereMonth('created_at', substr($date, 5, 2))
                        ->get();

        $totalTemples = $temples->count();
        $northTemples = $temples->where('sector', 'วัดภาคเหนือ')->count();
        $centralTemples = $temples->where('sector', 'วัดภาคกลาง')->count();
        $eastTemples = $temples->where('sector', 'วัดภาคตะวันออก')->count();
        $southTemples = $temples->where('sector', 'วัดภาคใต้')->count();

        $allTemples = Temple::count();
        return view('report.report_month', compact('totalTemples', 'northTemples', 'centralTemples', 'eastTemples', 'southTemples', 'allTemples', 'date'));
    }
}