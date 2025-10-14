<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\City;
use App\Models\Company;
use App\Models\District;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AddController extends Controller
{
    public function saveAdd(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'province' => 'required|exists:provinces,id',
            'district' => 'required|exists:districts,id',
            'city' => 'required|exists:cities,id',
            'description' => 'nullable|string|max:5000',
            'mobilenumber' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max per image
        ]);

        $companyid = Auth::user()->company_id;
        $ref = Auth::user()->name;

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/ads'), $imageName);
                $imagePaths[] = 'uploads/ads/' . $imageName;
            }
        }

        // get province details 
        $provinceId = $request->input('province');
        $province = Province::where('id', $provinceId)->first();
        $provinseName = $province->name_en;

        // get distric details 
        $districtId = $request->input('district');
        $district = District::where('id', $districtId)->first();
        $districtName = $district->name_en;

        // get city details 
        $cityId = $request->input('city');
        $city = City::where('id', $cityId)->first();
        $citytName = $city->name_en;

        // // Save to model
        $ad = new Add();
        $ad->title = $request->input('name');
        $ad->description = $request->input('description');
        $ad->images = json_encode($imagePaths); // Save as JSON array
        $ad->date_time = Carbon::now(); // You can change this
        $ad->status = 'pending'; // Example default status
        $ad->views = 0;
        $ad->city = $citytName; // Or pull from another field if available
        $ad->category = 'general'; // Same here
        $ad->validity = 14; // days or however you want
        $ad->availibility = 'available';
        $ad->province = $provinseName;
        $ad->district = $districtName;
        $ad->company_id = $companyid;
        $ad->mobile_number = $request->input('mobilenumber');
        $ad->price = $request->input('price');
        $ad->payment_status = 'pending';
        $ad->ref = $ref;
        $ad->save();

        return redirect()->back()->with('success', 'Ad posted successfully!');
    }

    public function backendAddposting()
    {
        return view('servicebaseads.index');
    }

    public function saveServiceAdd(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'province' => 'required|exists:provinces,id',
            'district' => 'required|exists:districts,id',
            'city' => 'required|exists:cities,id',
            'servicetype' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'price' => 'required|numeric|min:0',
            'mobilenumber' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max per image
        ]);



        $companyid = Auth::user()->company_id;

        $ref = Auth::user()->name;

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/ads'), $imageName);
                $imagePaths[] = 'uploads/ads/' . $imageName;
            }
        }

        // // Save to model

        // get province details 
        $provinceId = $request->input('province');
        $province = Province::where('id', $provinceId)->first();
        $provinseName = $province->name_en;

        // get distric details 
        $districtId = $request->input('district');
        $district = District::where('id', $districtId)->first();
        $districtName = $district->name_en;

        // get city details 
        $cityId = $request->input('city');
        $city = City::where('id', $cityId)->first();
        $citytName = $city->name_en;

        $ad = new Add();
        $ad->title = $request->input('name');
        $ad->description = $request->input('description');
        $ad->images = json_encode($imagePaths); // Save as JSON array
        $ad->date_time = Carbon::now(); // You can change this
        $ad->status = 'pending'; // Example default status
        $ad->views = 0;
        $ad->city = $citytName; // Or pull from another field if available
        $ad->category = $request->input('servicetype');
        $ad->validity = 14; // days or however you want
        $ad->availibility = 'available';
        $ad->province = $provinseName;
        $ad->district = $districtName;
        $ad->company_id = $companyid;
        $ad->mobile_number = $request->input('mobilenumber');
        $ad->price = $request->input('price');
        $ad->payment_status = 'pending';
        $ad->ref = $ref;

        $ad->save();

        return redirect()->back()->with('success', 'Ad posted successfully!');
    }

    public function myAds()
    {
        $companyid = Auth::user()->company_id;
        $myads = Add::where('company_id', $companyid)->orderBy('id', 'desc')->get();

        return view('frontend.myads', compact('myads'));
    }

    public function manageAds()
    {
        $pendingAds = Add::where('status', 'pending')->orderBy('id', 'desc')->get();
        return view('advertisments.index', compact('pendingAds'));
    }

    public function viewAds(Request $request)
    {
        $adId = $request->input('advertismentid');

        $advertisment = Add::find($adId);

        if (!$advertisment) {
            return response()->json(['error' => 'Advertisement not found'], 404);
        }

        // Determine company info
        if ($advertisment->company_id == 0) {
            $company = $advertisment->ref; // assuming 'ref' contains fallback company info (check if null)
        } else {
            $company = Company::find($advertisment->company_id);
        }

        // If no company found (for any reason), you may want to handle that
        if (!$company) {
            $company = null; // or provide a fallback object or message
        }

        $htmlContent = view('partials.advertisment', compact('advertisment', 'company'))->render();

        return response()->json(['html' => $htmlContent]);
    }

    public function updateReview(Request $request)
    {
        $advertisementid = $request->id;

        $advertisment = Add::where('id', $advertisementid)->first();
        $advertisment->status = 'active';

        $advertisment->save();

        return response()->json(['code' => 200, 'message' => 'Successful']);
    }

    public function allAds()
    {
        $ads = Add::where('status', 'active')->orderBy('date_time', 'desc')->paginate(10);
        $provinces = Province::with('districts.cities')->paginate(27);
        return view('frontend.allads', compact('ads', 'provinces'));
    }

    public function searchByProvince(Request $request)
    {

        $province = $request->get('province');

        $ads = Add::where('province', $province)
            ->where('status', 'active') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }




    public function searchByDistric(Request $request)
    {
        $distric = $request->get('distric');

        $ads = Add::where('district', $distric)
            ->where('status', 'active') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }





    public function searchByCity(Request $request)
    {
        $city = $request->get('city');

        $ads = Add::where('city', $city)
            ->where('status', 'active') // Optional filter
            ->orderBy('date_time', 'desc')
            ->paginate(27);

        return response()->json(['ads' => $ads]);
    }



    public function searchByType(Request $request)
    {
        $type = $request->get('type');

        $ads = Add::where('category', $type)
            ->where('status', 'active') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }

    public function searchByAny(Request $request)
    {
        $searchTerm = $request->get('searchbyvr');

        $ads = Add::where('status', 'active')
            ->where(function ($query) use ($searchTerm) {
                $query->where('category', 'like', '%' . $searchTerm . '%')
                    ->orWhere('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('city', 'like', '%' . $searchTerm . '%')
                    ->orWhere('province', 'like', '%' . $searchTerm . '%')
                    ->orWhere('district', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }



    // school service

    public function searchByProvinceSchoolService(Request $request)
    {

        $province = $request->get('province');

        $ads = Add::where('province', $province)
            ->where('status', 'active') // Optional filter
            ->where('category', 'School Transport') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    public function searchByDistrichoolService(Request $request)
    {
        $distric = $request->get('distric');

        $ads = Add::where('district', $distric)
            ->where('status', 'active') // Optional filter
            ->where('category', 'School Transport') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    public function searchByCitySchoolService(Request $request)
    {
        $city = $request->get('city');

        $ads = Add::where('city', $city)
            ->where('status', 'active') // Optional filter
            ->where('category', 'School Transport') // Optional filter
            ->orderBy('date_time', 'desc')
            ->paginate(27);

        return response()->json(['ads' => $ads]);
    }


    public function searchByAnySchoolService(Request $request)
    {
        $searchTerm = $request->get('searchbyvr');

        $ads = Add::where('status', 'active')
            ->where(function ($query) use ($searchTerm) {
                $query->where('category', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }



    // brakedown service

    public function searchByProvinceBrakedownService(Request $request)
    {

        $province = $request->get('province');

        $ads = Add::where('province', $province)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Breakdown Service') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    public function searchByDistricBrakedownService(Request $request)
    {
        $distric = $request->get('distric');

        $ads = Add::where('district', $distric)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Breakdown Service') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    public function searchByCityBrakedownService(Request $request)
    {
        $city = $request->get('city');

        $ads = Add::where('city', $city)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Breakdown Service') // Optional filter
            ->orderBy('date_time', 'desc')
            ->paginate(27);

        return response()->json(['ads' => $ads]);
    }


    public function searchByAnyBrakedownService(Request $request)
    {
        $searchTerm = $request->get('searchbyvr');

        $ads = Add::where('status', 'active')
            ->where(function ($query) use ($searchTerm) {
                $query->where('category', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    // staff service

    public function searchByProvinceStaffService(Request $request)
    {

        $province = $request->get('province');

        $ads = Add::where('province', $province)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Staff Transport') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    public function searchByDistricStaffService(Request $request)
    {
        $distric = $request->get('distric');

        $ads = Add::where('district', $distric)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Staff Transport') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    public function searchByCityStaffService(Request $request)
    {
        $city = $request->get('city');

        $ads = Add::where('city', $city)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Staff Transport') // Optional filter
            ->orderBy('date_time', 'desc')
            ->paginate(27);

        return response()->json(['ads' => $ads]);
    }


    public function searchByAnyStaffService(Request $request)
    {
        $searchTerm = $request->get('searchbyvr');

        $ads = Add::where('status', 'active')
            ->where(function ($query) use ($searchTerm) {
                $query->where('category', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    // ambulance service

    public function searchByProvinceambulanceService(Request $request)
    {

        $province = $request->get('province');

        $ads = Add::where('province', $province)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Ambulance Service') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    public function searchByDistricambulanceService(Request $request)
    {
        $distric = $request->get('distric');

        $ads = Add::where('district', $distric)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Ambulance Service') // Optional filter
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }


    public function searchByCityambulanceService(Request $request)
    {
        $city = $request->get('city');

        $ads = Add::where('city', $city)
            ->where('status', 'active') // Optional filter
            ->where('category', 'Ambulance Service') // Optional filter
            ->orderBy('date_time', 'desc')
            ->paginate(27);

        return response()->json(['ads' => $ads]);
    }


    public function searchByAnyambulanceService(Request $request)
    {
        $searchTerm = $request->get('searchbyvr');

        $ads = Add::where('status', 'active')
            ->where(function ($query) use ($searchTerm) {
                $query->where('category', 'like', '%' . $searchTerm . '%');
            })
            ->orderBy('date_time', 'desc')
            ->get();

        return response()->json(['ads' => $ads]);
    }

    public function viewAdd(Request $request)
    {
        $addId = $request->id;
        $add = Add::where('id', $addId)->first();

        $add->increment('views');

        return view('frontend.viewad', compact('add'));
    }

    public function alladsAdminmanage()
    {
        $allads = Add::orderBy('id', 'desc')->get();

        $cities = City::all();
        $provinces = Province::all();
        $districts = District::all();

        return view('advertisments.alladsadminmanagement', compact('allads','cities', 'provinces', 'districts'));
    }

    public function deleteAds(Request $request)
    {
        $addid = $request->advertismentid;
        $ad = Add::find($addid);

        if (!$ad) {
            return response()->json(['message' => 'Ad not found'], 404);
        }

        $ad->delete();

        return response()->json(['message' => 'Ad deleted successfully'], 200);
    }

    public function addDetails(Request $request){
        $addid = $request->advertismentid;
        $ad = Add::find($addid);

        if (!$ad) {
            return response()->json(['message' => 'Ad not found'], 404);
        }

        return response()->json(['advertisment' => $ad], 200);
    }
}
