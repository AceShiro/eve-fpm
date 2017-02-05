<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Redirect the user to the Eve Online authentication page.
     *
     * @return \Illuminate\View\View
     */
    public function redirectToProvider()
    {
        return Socialite::driver('eveonline')->redirect();
    }

    /**
     * Obtain the user information from Eve Online.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('eveonline')->user();

        $token = $user->token;
        $expiresIn = $user->expiresIn;

        $user->getId();
        $user->getName();
        $user->getAvatar();

        $request->session()->regenerate();

        $request->session()->put('user_id', $user->id);
        $request->session()->put('name', $user->name);
        $request->session()->put('avatar', $user->avatar);


        return redirect()->route('main');
    }
}
