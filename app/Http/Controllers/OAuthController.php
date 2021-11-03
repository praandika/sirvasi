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
            $cekUser = User::where('google_id', $user->getId())->first();
            if ($cekUser) {
                Auth::login($cekUser);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name' => $user->getName(),
                    'username' => $user->getEmail(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'avatar' => $user->getAvatar(),
                    'password' => bcrypt('12345678')
                ]);
                Auth::login($newUser);
                return redirect('/');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
