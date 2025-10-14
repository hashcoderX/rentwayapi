<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Invoice;
use App\Models\Vehical;
use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function salesreport()
    {

        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $userid = Auth::user()->id;
            $companyid = Auth::user()->company_id;
            $date = Carbon::now()->format('Y-m-d');
            $month = Carbon::now()->format('Y-m');

            $todayearning = DB::table('payments')->where('company_id', $companyid)->where('date_time', $date)->sum('amount');
            $monthearning = DB::table('payments')->where('company_id', $companyid)->where('month', $month)->sum('amount');
            return view('reports.salereport', compact('todayearning', 'monthearning'));
        }
    }

    public function genarateearningreport(Request $request)
    {
        $userid = Auth::user()->id;
        $companyid = Auth::user()->company_id;

        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $formattedstartdate = date("Y-m-d ", strtotime($startdate));
        $formattedenddate = date("Y-m-d ", strtotime($enddate));

        // invoice details 
        // $totalcollectionAmount = DB::table('payments')
        //     ->where('shopid', $branchid)
        //     ->whereBetween('date', [$formattedstartdate, $formattedenddate])
        //     ->where('collect_type', 'Collection')
        //     ->sum('payed_amount');

        $invoices = DB::table('invoices')
            ->where('company_id', $companyid)
            ->whereBetween('invoice_compleat_date', [$formattedstartdate, $formattedenddate])
            ->paginate(10);

        // End 

        $todayearnings = DB::table('payments')
            ->where('company_id', $companyid)
            ->whereBetween('date_time', [$formattedstartdate, $formattedenddate])
            ->get();

        // return response()->json(['todayearnings' => $todayearnings], 201);

        $htmlContent = view('partials.payments_daterange', compact('todayearnings', 'invoices'))->render();
        return response()->json(['html' => $htmlContent]);
    }

    public function vehicleMaintainReport(Request $request)
    {

        $userid = Auth::user()->id;
        $companyid = Auth::user()->company_id;

        $vehicles = Vehical::where('company_id', $companyid)->get();

        return view('reports.vehiclemaintainreport', compact('vehicles'));
    }

    public function genVehicleMaintainReport(Request $request)
    {
        $userid = Auth::user()->id;
        $companyid = Auth::user()->company_id;

        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $vehicleno = $request->vehicleno;

        $vehiclemaintains = Expenses::where('company_id', $companyid)
            ->where('reference', $vehicleno)
            ->whereBetween('date_time', [$startdate, $enddate])
            ->get();

        $htmlContent = view('partials.vehiclemaintainreport', compact('vehiclemaintains'))->render();
        return response()->json(['html' => $htmlContent]);
    }

    public function vehicleEarningReport(Request $request)
    {

        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $userid = Auth::user()->id;
            $companyid = Auth::user()->company_id;

            $vehicles = Vehical::where('company_id', $companyid)->get();

            return view('reports.vehicleearning', compact('vehicles'));
        }
    }

    public function genVehicleEarningReport(Request $request)
    {
        $userid = Auth::user()->id;
        $companyid = Auth::user()->company_id;

        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $vehicleno = $request->vehicleno;

        $vehicleearnings = Invoice::where('company_id', $companyid)
            ->where('vehicle_no', $vehicleno)
            ->whereBetween('invoice_date', [$startdate, $enddate])
            ->get();

        $htmlContent = view('partials.vehicleearningreport', compact('vehicleearnings'))->render();
        return response()->json(['html' => $htmlContent]);
    }
}
