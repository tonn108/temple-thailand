<?php

namespace App\Http\Controllers;

use App\Models\Temple;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report_day(Request $request)
    {
        $date = $request->report_date ?? today();

        $temples = Temple::where('created_at', $date)->get();

        $totalTemples = Temple::count();

        $northTemples = Temple::where('sector', 'วัดภาคเหนือ')->count();
        $centralTemples = Temple::where('sector', 'วัดภาคกลาง')->count();
        $eastTemples = Temple::where('sector', 'วัดภาคตะวันออก')->count();
        $southTemples = Temple::where('sector', 'วัดภาคใต้')->count();

        return view('report.report_day', compact('totalTemples', 'northTemples', 'centralTemples', 'eastTemples', 'southTemples'));
    }

    public function report_month(Request $request)
    {
        $date = $request->report_month ?? now()->format('Y-m');

        $temples = Temple::whereYear('created_at', substr($date, 0, 4))
                        ->whereMonth('created_at', substr($date, 5, 2))
                        ->get();

        $totalTemples = Temple::count();

        $northTemples = Temple::where('sector', 'วัดภาคเหนือ')->count();
        $centralTemples = Temple::where('sector', 'วัดภาคกลาง')->count();
        $eastTemples = Temple::where('sector', 'วัดภาคตะวันออก')->count();
        $southTemples = Temple::where('sector', 'วัดภาคใต้')->count();

        return view('report.report_month', compact('totalTemples', 'northTemples', 'centralTemples', 'eastTemples', 'southTemples'));
    }
}