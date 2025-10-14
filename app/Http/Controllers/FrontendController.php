<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\City;
use App\Models\Company;
use App\Models\District;
use App\Models\Province;
use App\Models\Vehical;
use App\Models\Vehicle_has_booking;
use App\Models\Vehicle_has_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Format;
use Intervention\Image\Laravel\Facades\Image;

class FrontendController extends Controller
{

    public function catViews()
    {
        return view('frontend.catviews');
    }
    public function mainPage()
    {
        $avalibleVehicles = Vehical::where('avalibility', 'yes')
        ->has('images') // Only include vehicles with at least one image
        ->with(['images' => function ($query) {
            $query->orderBy('id', 'desc')->limit(1); // Get latest image
        }])
        ->get();

        $ourcarowners = Company::all();

        return view('frontend.homepage', compact('avalibleVehicles', 'ourcarowners'));
    }

    public function aboutPage()
    {
        $ourcarowners = Company::all();
        return view('frontend.aboutus', compact('ourcarowners'));
    }

    public function vehiclePage()
    {
        if (Auth::check()) {

            $cities = City::all();

            $avalibleVehicles = Vehical::where('avalibility', 'yes')
                ->with([
                    'company',
                    'images' => function ($query) {
                        $query->orderBy('id', 'desc')->limit(1); // Fetch latest image by ID
                    }
                ])
                ->paginate(12);

            $provinces = Province::with('districts.cities')->get();

            return view('frontend.vehicals', compact('avalibleVehicles', 'provinces'));
        } else {
            return view('frontend.customerlogin');
        }
    }

    public function contactPage()
    {
        return view('frontend.contactus');
    }

    public function fleetView(Request $request)
    {
        $vehicleId = $request->id;

        $vehicle = Vehical::where('id', $vehicleId)->first();
        $companyid = $vehicle->company_id;

        $company = Company::where('id', $companyid)->first();
        $vehiclephotos = Vehicle_has_image::where('vehicle_id', $vehicleId)->get();

        return view('frontend.fleetview', compact('vehicle', 'vehiclephotos', 'company'));
    }

    public function forVehicleowners()
    {
        $provinces = Province::all();
        $districts = District::all();
        $cities = City::all();

        return view('frontend.vehicleownerindex', compact('provinces', 'districts', 'cities'));
    }

    public function bookingTrip()
    {
        $userid =   Auth::user()->name;

        return view('frontend.bookingtrips');
    }

    public function getVehicleByProvince(Request $request)
    {
        $province = $request->province;

        $companies = Company::with(['vehicles' => function ($q) {
            $q->where('avalibility', 'yes')->with('latestImage');
        }])
            ->where('located_province', $province)
            ->get();

        return response()->json([
            "status" => 200,
            "vehicle" => $companies
        ]);
    }

    public function getVehicleByDitrict(Request $request)
    {
        $distric = $request->distric;

        $companies = Company::with(['vehicles' => function ($q) {
            $q->where('avalibility', 'yes')->with('latestImage');
        }])
            ->where('distric', $distric)
            ->get();

        return response()->json([
            "status" => 200,
            "vehicle" => $companies
        ]);
    }

    public function getVehicleByCity(Request $request)
    {
        $city = $request->city;

        $companies = Company::with(['vehicles' => function ($q) {
            $q->where('avalibility', 'yes')->with('latestImage');
        }])
            ->where('city', $city)
            ->get();

        return response()->json([
            "status" => 200,
            "vehicle" => $companies
        ]);
    }

    public function getVehicleByDateRange(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        // $city = $request->city;

        // Get all vehicle IDs that are booked in the given range and not canceled
        $bookedVehicleIds = Vehicle_has_booking::where(function ($query) use ($startDate, $endDate) {
            $query->whereDate('book_start_date', '<=', $endDate)
                ->whereDate('return_date', '>=', $startDate)
                ->where('status', '!=', 'canceled');
        })->pluck('vehicle_no');

        // Now load all companies and their available vehicles EXCLUDING booked ones
        $companies = Company::with(['vehicles' => function ($q) use ($bookedVehicleIds) {
            $q->where('avalibility', 'yes')
                ->whereNotIn('id', $bookedVehicleIds)
                ->with(['latestImage']);
        }])
            ->get();

        return response()->json([
            "status" => 200,
            "vehicle" => $companies
        ]);
    }

    public function postAdd()
    {
        if (Auth::check()) {
            return view('frontend.advertizerdashboard');
        } else {
            return view('frontend.advertiserlogin');
        }
    }

    public function signupCustomer()
    {
        if (Auth::check()) {
            return view('frontend.postads');
        } else {
            $provinces = Province::all();
            $districts = District::all();
            $cities = City::all();
            return view('frontend.customerreg', compact('provinces', 'districts', 'cities'));
        }
    }

    public function signupAdvertiser()
    {
        if (Auth::check()) {
            return view('frontend.postads');
        } else {
            $provinces = Province::all();
            $districts = District::all();
            $cities = City::all();
            return view('frontend.advertiser_reg', compact('provinces', 'districts', 'cities'));
        }
    }

    public function getRentwaySystem()
    {
        $provinces = Province::all();
        $districts = District::all();
        $cities = City::all();
        return view('frontend.rentwaysystem', compact('provinces', 'districts', 'cities'));
    }

    public function getRides()
    {
        if (Auth::check()) {
            return view('frontend.getride');
        } else {
            return view('frontend.customerlogin');
        }
    }

    public function rentWithUs()
    {

        if (Auth::check()) {
            return view('frontend.rentyourvehicle');
        } else {
            return view('frontend.customerlogin');
        }
    }

    public function getJob()
    {

        if (Auth::check()) {
            return view('frontend.getjob');
        } else {
            return view('frontend.customerlogin');
        }
    }

    public function rentVehicleads()
    {
        if (Auth::check()) {
            $cities = City::all();
            $provinces = Province::all();
            $districts = District::all();
            return view('frontend.vehicleads', compact('cities', 'provinces', 'districts'));
        } else {
            return view('frontend.advertiserlogin');
        }
    }

    public function servicebaseAds()
    {
        if (Auth::check()) {
            $cities = City::all();
            $provinces = Province::all();
            $districts = District::all();
            return view('frontend.servicebaseads', compact('cities', 'provinces', 'districts'));
        } else {
            return view('frontend.advertiserlogin');
        }
    }

    public function findambulanceAds()
    {
        $ads = Add::where('status', 'active')->where('category', 'Ambulance Service')->orderBy('date_time', 'desc')->paginate(27);
        $provinces = Province::with('districts.cities')->get();
        return view('frontend.findambulance', compact('ads', 'provinces'));
    }

    public function findBrakedownServiceAds()
    {
        $ads = Add::where('status', 'active')->where('category', 'Breakdown Service')->orderBy('date_time', 'desc')->paginate(27);
        $provinces = Province::with('districts.cities')->get();
        return view('frontend.findbrakedownservice', compact('ads', 'provinces'));
    }

    public function findstarfftransportAds()
    {
        $ads = Add::where('status', 'active')->where('category', 'Starf Transport')->orderBy('date_time', 'desc')->paginate(27);
        $provinces = Province::with('districts.cities')->get();
        return view('frontend.findstafftransport', compact('ads', 'provinces'));
    }

    public function schooltransportAds()
    {
        $ads = Add::where('status', 'active')->where('category', 'School Transport')->orderBy('date_time', 'desc')->paginate(27);
        $provinces = Province::with('districts.cities')->get();
        return view('frontend.findschooltransport', compact('ads', 'provinces'));
    }

    public function forgetCustomerPassword()
    {
        return view('frontend.customerpasswordreset');
    }
}
