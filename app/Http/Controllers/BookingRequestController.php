<?php

namespace App\Http\Controllers;

use App\Models\BookingRequest;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingRequestController extends Controller
{
    public function addBookingRequest(Request $request)
    {
        $date_time = Carbon::now()->format('Y-m-d');

        $pickuplocation = $request->pickuplocation;
        $droplocation = $request->droplocation;
        $pickupdate = $request->pickupdate;
        $dropdate = $request->dropdate;
        $vehicletype = $request->vehicletype;
        $note = $request->note;

        $logingId =   Auth::user()->id;

        // get customer details 
        $customer = Customer::where('user_id', $logingId)->first();
        $customerId = $customer->id;
        $customername = $customer->full_name;
        $province = $customer->province;
        $distric = $customer->distric;
        $city = $customer->city;

        $bookingReq = new BookingRequest();
        $bookingReq->customer_id =  $customerId;
        $bookingReq->customer_name =  $customername;
        $bookingReq->province =  $province;
        $bookingReq->distric =  $distric;
        $bookingReq->city =  $city;
        $bookingReq->pickup =  $pickuplocation;
        $bookingReq->dropof = $droplocation;
        $bookingReq->pickupdate = $pickupdate;
        $bookingReq->dopofdate = $dropdate;
        $bookingReq->type_of_vehicle = $vehicletype;
        $bookingReq->note = $note;
        $bookingReq->date_time = $date_time;
        $bookingReq->views = '0';
        $bookingReq->status = 'pending';

        $bookingReq->save();

        return response()->json([
            "status" => 200,
            "booking" => $bookingReq
        ]);
    }
}
