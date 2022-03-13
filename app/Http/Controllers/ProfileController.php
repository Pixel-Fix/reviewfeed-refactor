<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Review;
use App\Models\User;

class ProfileController extends Controller
{
    //

    public function showMyReviews()
    {
        $reviews = Review::where('user_id',Auth::id())
                        ->orderBy('created_at','desc')
                        ->paginate(10);

        return view('profile.profile-reviews',[
            'reviews' => $reviews,
        ]);
    }

    public function showMyCompanyReviews()
    {
        $company = Auth::user()->company;
        if($company !== null)
        {
            return redirect(route('companies.reviews',[$company->slug]));
        }
        else
        {
            return redirect(route('home'));
        }
    }

    public function showProfileUpdateForm()
    {

        return view('profile.profile-update',[

        ]);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required | min:3 | max:255',
            'lastname' => 'required | min:3 | max:255',
            'displayname' => 'required | min:3 | max:255 | unique:users,displayname,'.Auth::id(),
            'email' => 'required | min:3 | max:255 | unique:users,email,'.Auth::id(),
        ]);

        $user = User::findOrFail(Auth::id());
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->displayname = $request->input('displayname');
        if($user->email != $request->input('email'))
        {
            $user->email = $request->input('email');
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect(route('profile.update'));
    }

    public function showPasswordUpdateForm()
    {
        return view('profile.profile-password',[

        ]);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'password' => 'required | min:8 | max:255 | confirmed',
        ]);

        $user = User::findOrFail(Auth::id());
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::logout();

        return redirect(route('profile.password'));
    }

    public function showBlocked()
    {
        if(Auth::check())
        {
            if(Auth::user()->is_active === true)
            {
                return redirect(route('home'));
            }

            return view('profile.profile-blocked',[

            ]);
        }

        return redirect(route('home'));
    }
}
