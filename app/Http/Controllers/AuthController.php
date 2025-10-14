<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Vehical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function customerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'success' => true,
                'redirect' => route('rederectDashbord'),
                'message' => 'Login successful!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials!'
            ], 401);
        }
    }

    public function rederectDashbord()
    {
        $userid = Auth::user()->id;

        // Get Log id 
        $user = User::where('id', $userid)->first();
        echo $logid =  $user->logid;

        $avalibleVehicles = Vehical::where('avalibility', 'yes')
            ->with(['images' => function ($query) {
                $query->orderBy('id', 'desc')->limit(1); // Fetch latest image by ID
            }])
            ->get();

        $ourcarowners = Company::all();


        return view('frontend.dashboard', compact('avalibleVehicles', 'ourcarowners'));
    }

    public function advertizerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'success' => true,
                'redirect' => route('rederectadvertizerDashbord'),
                'message' => 'Login successful!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials!'
            ], 401);
        }
    }

    public function rederectadvertizerDashbord()
    {
        $userid = Auth::user()->id;

        // Get Log id 
        $user = User::where('id', $userid)->first();
        echo $logid =  $user->logid;

        return view('frontend.advertizerdashboard');
    }
}
