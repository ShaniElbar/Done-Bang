<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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


            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt('google'),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user);

            $redirectUrl = $user->name ? route('themes.default.inbox') : route('auth.createProfile');

            return "<script> 
            window.opener.location.href = '$redirectUrl'
            window.close()
            </script>";

        } catch (\Exception $e) {
            return "<script>
                    alert('Login gagal, coba lagi.');
                    window.close();
                </script>";
        }
    }
}
