<?php

namespace App\Http\Controllers;

use App\Mail\SendNewsletterVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at','desc')
                        ->take(5)
                        ->get();

        $categories = Category::orderBy('name')
                        ->get();

        return view('home',[
            'categories' => $categories,
            'reviews' => $reviews,
        ]);
    }

    public function showDisclaimer()
    {
        return view('disclaimer',[

        ]);
    }

    public function showPrivacy()
    {
        return view('privacy',[

        ]);
    }

    public function subscribe(Request $request)
    {
        $this->validate($request,[
            'email' => 'required | email | max:255',
        ]);

        $code = Str::slug(Hash::make($request->input('email')),"");

        $newsletter = Newsletter::firstOrCreate([
            'email' => $request->input('email')
        ],[
            'email' => $request->input('email'),
            'ip_address' => $request->ip(),
            'verification_code' => $code,
        ]);

        $message["to"] = $request->input('email');
        $message["url"] = route('newsletter.verify',$code);
       // $message["replyTo"] = $request->input('email');

        $mail = Mail::send(new SendNewsletterVerification($message));

        return redirect(URL::previous());
    }

    public function verifyNewsletterSignup($code)
    {
        //echo $code;

        $newsletter = Newsletter::where('verification_code',$code)
                                ->first();
        if($newsletter !== null)
        {
            $newsletter->verified_at = date('Y-m-d H:i:s');
            $newsletter->save();
        }

        //exit;
        return redirect(route('home'));
    }

}
