<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    // Add more fields if your User model has them
                ]
            );

            Auth::login($user);

            return redirect()->intended('/dashboardfr'); // or wherever you want

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed!');
        }
    }

    public function handleGoogleCallbackAdvertizer()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    // Add more fields if your User model has them
                ]
            );

            Auth::login($user);

            return redirect()->intended('/postadd'); // or wherever you want

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google login failed!');
        }
    }
}
