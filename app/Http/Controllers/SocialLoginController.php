<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SocialLoginController extends Controller
{
    //

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $userDetails = Socialite::driver($provider)->user();

        //var_dump($userDetails);
        //exit;
        $user = $this->createUser($userDetails,$provider);

        Auth::login($user);
        return redirect(route('home'));
    }

    public function createUser($user,$provider)
    {
        $names = explode(' ',$user->getName());

        $newUser = User::firstOrNew(['email' => $user->email]);

        if($newUser->firstname === null)
        {
            (isset($names[0])) ? ($newUser->firstname=$names[0]) : ('Firstname');
        }
        if($newUser->lastname === null)
        {
            (isset($names[1])) ? ($newUser->lastname=$names[1]) : ('Lastname');
        }

        if($newUser->displayname === null)
        {
            $newUser->displayname = $user->getName();
        }

        if($newUser->email === null)
        {
            $newUser->email = $user->getEmail();
        }

        if(($newUser->profile_pic === null) || (substr($newUser->profile_pic,-8) == 'user.png'))
        {
            $newUser->profile_pic = Image::make($user->getAvatar())->resize(300,300)->encode('data-url');
        }

        if($newUser->password === null)
        {
            $newUser->password = Hash::make($this->generateCode());
        }

        if($newUser->provider === null)
        {
            $newUser->provider = $provider;
        }

        if($newUser->provider_id === null)
        {
            $newUser->provider_id = $user->id;
        }

        if($newUser->email_verified_at === null)
        {
            $newUser->email_verified_at = date('Y-m-d H:i:s');
        }

        $newUser->save();
        return $newUser;
    }

    public function generateCode()
    {
        $code = '';
        for($x=0;$x<=10;$x++)
        {
            $code .= rand(0,15);
        }

        return $code;
    }
}
