<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;

class OAuthController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        try {
            $user = Socialite::driver('google')->user();
            $cekUser = User::where('google_id', $user->id)->first();
            if ($cekUser) {
                Auth::login($cekUser);
                return redirect()->route('landing.page');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $user->email,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => bcrypt('12345678')
                ]);
                Auth::login($newUser);
                return redirect()->route('landing.page');
            }
        } catch (\Throwable $th) {
            return redirect('auth/google');
            dd($user);
        }
    }
}
