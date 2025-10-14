<?php

namespace App\Http\Controllers;

use App\Models\Billalignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class SettingController extends Controller
{
    //
    public function manVeriable()
    {

        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $userid = Auth::user()->id;
            $companyid = Auth::user()->company_id;
            $variables = Billalignment::where('company_id', $companyid)->get();
            $invoicecolumns = Schema::getColumnListing('invoices');
            $customerallColumns = Schema::getColumnListing('customers');
            $vehicleColumns = Schema::getColumnListing('vehicals');
            $vehicle_has_bookings = Schema::getColumnListing('vehicle_has_bookings');

            // Merge both column arrays
            $allColumns = array_merge($invoicecolumns, $customerallColumns, $vehicleColumns, $vehicle_has_bookings);

            return view('setting.managevariable', compact('variables', 'allColumns'));
        }
    }

    public function updateVariablevisibility(Request $request)
    {
        $variableid = $request->variableid;
        $value = $request->value;

        $variables = Billalignment::where('id', $variableid)->first();
        $variables->display = $value;

        $variables->save();

        return redirect()->back();
    }

    public function updateVariablevalue(Request $request)
    {
        $value = $request->value;
        $elementid = $request->elementid;

        $element = Billalignment::where('id', $elementid)->first();
        $element->value = $value;
        $element->save();

        return redirect()->back();
    }

    public function updatePossition(Request $request){
        $value = $request->value;
        $elementid = $request->elementid;

        $element = Billalignment::where('id', $elementid)->first();
        $element->element_top_possition = $value;
        $element->save();

        return redirect()->back();
    }  

    public function updatePossitionLeft(Request $request){
        $value = $request->value;
        $elementid = $request->elementid;

        $element = Billalignment::where('id', $elementid)->first();
        $element->element_left_possition = $value;
        $element->save();

        return redirect()->back();
    }
}
