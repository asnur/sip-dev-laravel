<?php

namespace App\Http\Controllers;

use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($user, 'google');
        Auth::login($authUser, true);
        $foto = file_get_contents($user->getAvatar());
        File::put(public_path() . '/profile/' . $authUser->id . '.jpg', $foto);
        // dd($foto);
        // $request->session()->put('img_profile', $user->getAvatar());

        // if ($request->session()->get('access_chat')) {
        //     return redirect('/konsul');
        // } else {
        //     return redirect('/');
        // }
        return redirect('/');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        } else {
            $data = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id
            ]);

            return $data;
        }
    }
}
