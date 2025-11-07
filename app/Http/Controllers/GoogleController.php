<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(str()->random(16)),
                    'usertype' => 'customer',
                ]
            );

            Auth::login($user);

            return redirect('/dashboardfr');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed!');
        }
    }

    public function handleGoogleCallbackAdvertizer()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'usertype' => 'Advertiser',
                    'password' => bcrypt(str()->random(16)),
                ]
            );

            Auth::login($user);

            return redirect()->intended('/postadd');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed!');
        }
    }
}
