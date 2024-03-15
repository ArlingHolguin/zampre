<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $userExist = User::where('external_id', $user->id)
                         ->where('external_auth', 'google')
                         ->first();

        if ($userExist) {
            Auth::login($userExist);
        } else {
            $path_url = $user->avatar;
            $partial = Str::after($path_url, '/storage/');

            if (!Str::startsWith($partial, ['http://', 'https://'])) {
                $partial = 'https://' . $partial;
            }

            $userNew = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'profile_photo_path' => $partial,
                'email_verified_at' => now(),
                'external_id' => $user->id,
                'external_auth' => 'google'
            ]);
    
            Auth::login($userNew);
        }

        return redirect()->route('home');
    }
}
