<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Traits\HasRoles;


use Illuminate\Foundation\Auth\AuthenticatesUsers;


class SocialiteController extends Controller
{
    use AuthenticatesUsers;
    use HasRoles;

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $users = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($users, 'google');
        Auth::login($authUser, true);

        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $foto = file_get_contents($users->getAvatar(), false, stream_context_create($arrContextOptions));
        File::put(public_path() . '/profile/' . $authUser->id . '.jpg', $foto);

        return redirect()->to('/');
    }


    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect('admin.page');
        }
        return redirect()->route('home');
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
            $data->assignRole('user');

            return $data;
        }
    }
}
