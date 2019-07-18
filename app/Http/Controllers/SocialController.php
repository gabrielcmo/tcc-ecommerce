<?php

namespace Doomus\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response, File;
use Socialite;
use App\User;

class SocialController extends Controller
{
    /*
    * Redirect the user to the provider authentication page 
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /*
    * Obtain the user information from provider
    *
    * @return \Illuminate\Http\Response
    */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        // $token = $user->token;
        // $refreshToken = $user->refreshToken; // not always provided
        // $expiresIn = $user->expiresIn;

        // $user->getId();
        // $user->getNickname();
        // $user->getName();
        // $user->getEmail();

        return;
    }
}
