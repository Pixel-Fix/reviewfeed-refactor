<?php

namespace App\Http\Controllers;

use App\Mail\SendCompanyVerification;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Review;
use App\Models\Category;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    //
    public function searchCompanyName(Request $request)
    {
        // Ajax function on create a review step 1
        // $companies = Company::where('name','like',$request->input('name')."%")
        //                     ->take(50)
        //                     ->get();
        $companies = Company::whereRaw('MATCH (name) AGAINST (?)',$request->input('name'))
                            ->take(50)
                            ->get();
        $array = [];
        $x=0;
        foreach($companies as $company)
        {
            $array[$x]['name'] = $company->name;
            $x++;
        }
        return json_encode($array);
    }

    public function showCompanyReviewsList($company_slug)
    {
        $company = Company::where('slug',$company_slug)
                            ->firstOrFail();
        $reviews = Review::where('company_id',$company->id)
                            ->orderBy('created_at','desc')
                            ->paginate(10);

        $stats = $company->get_review_stats();

        return view('company.company-reviews',[
            'reviews' => $reviews,
            'company' => $company,
            'stats' => $stats,
            'page_title' => "Reviews for ".$company->name,
        ]);
    }

    public function showCompanyLanding()
    {
        $company_count = Company::selectRaw('count(*) as count')
                            ->first();
        $companies = Company::inRandomOrder()
                            ->take(10)
                            ->get();

        return view('company.company-landing',[
            'company_count' => $company_count,
            'companies' => $companies,
        ]);
    }

    public function showCompanyCreateForm()
    {
        // if(Auth::user()->company !== null)
        // {
        //     return redirect(route('companies.update'));
        // }
        $categories = Category::orderBy('name','asc')->get();
        $states = State::orderBy('name','asc')->get();
        return view('company.company-create',[
            'categories' => $categories,
            'states' => $states,
        ]);
    }

    public function createCompany(Request $request)
    {
        foreach($request->all() as $key => $value)
        {
            $data[$key] = $value;
        }
        $this->validate($request,[
            'name' => 'required | min:5 | max:255 | unique:companies',
            'description' => 'required | min:5 | max:255',
            'location' => 'required | min:5 | max:255',
            'category' => 'required | numeric',
            'state' => 'required | numeric',
            'website_url' => 'required | url | max:255',
            'email' => 'required | email | max:255',
            'terms' => 'required | string',
            'company_logo' => 'required | mimes:png,jpeg,webp',
        ]);

        $validator = Validator::make([
            'slug' => Str::slug(strip_tags($request->input('name'))),
        ],[
            'slug' => 'unique:companies',
        ],[
            'slug.unique' => 'The name must be unique',
        ]);
        //var_dump(Str::slug(strip_tags($request->input('name'))));
        //var_dump($validator->fails());
        //exit;
        if($validator->fails())
        {
            return redirect(route('companies.create'))->withInput()->withErrors($validator);
            // $categories = Category::orderBy('name','asc')->get();
            // $states = State::orderBy('name','asc')->get();
            // return view('company.company-create',[
            //     'categories' => $categories,
            //     'states' => $states,
            // ])->with('data',$data)->withErrors($validator);
        }

        $company = new Company;
        $company->name = $request->input('name');
        $company->user_id = Auth::id();
        $company->slug = Str::slug(strip_tags($request->input('name')));
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $company->category_id = $request->input('category');
        $company->state_id = $request->input('state');
        $company->website_url = $request->input('website_url');
        $company->email = $request->input('email');
        $company->contact_number = $request->input('contact_number');
        $company->facebook_url = $request->input('facebook_url');
        $company->twitter_url = $request->input('twitter_url');
        $company->insta_url = $request->input('insta_url');

        if($request->hasFile('company_logo'))
        {
            $company->image = Image::make($request->file('company_logo'))->resize(300,300)->encode('data-url');
        }

        $company->save();

        //exit;
        return redirect(route('companies.list'));
    }

    public function showCompanyUpdateForm($company_slug)
    {
        $company = Auth::user()->companies()->where(['slug'=>$company_slug])->first();
        $categories = Category::orderBy('name','asc')->get();
        $states = State::orderBy('name','asc')->get();
        return view('company.company-update',[
            'company' => $company,
            'categories' => $categories,
            'states' => $states,
        ]);
    }

    public function updateCompany(Request $request)
    {

        $this->validate($request,[
            'description' => 'required | min:5 | max:255',
            'location' => 'required | min:5 | max:255',
            'category' => 'required | numeric',
            'state' => 'required | numeric',
            'website_url' => 'required | url | max:255',
            'email' => 'required | email | max:255',
            'terms' => 'required | string',
        ]);

        $company = Auth::user()->company;
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $company->category_id = $request->input('category');
        $company->state_id = $request->input('state');
        $company->website_url = $request->input('website_url');
        if($company->email != $request->input('email'))
        {
            $company->email = $request->input('email');
            $company->email_verified_at = null;
            $company->email_verification_code = null;
            $company->active = false;
        }
        $company->contact_number = $request->input('contact_number');
        $company->facebook_url = $request->input('facebook_url');
        $company->twitter_url = $request->input('twitter_url');
        $company->insta_url = $request->input('insta_url');
        $company->save();

        //exit;
        return redirect(route('companies.update',$company->slug));
    }

    public function updateCompanyLogo(Request $request)
    {
        $this->validate($request,[
            'company_logo' => 'required | mimes:png,jpg,webp',
        ]);

        if($request->hasFile('company_logo'))
        {
            $company = Auth::user()->company;
            $company->image = Image::make($request->file('company_logo'))->resize(300,300)->encode('data-url');
            $company->save();
        }

        return redirect(route('companies.update',$company->slug));
    }

    public function showCompanyList(Request $request)
    {
        $companies = Auth::user()->companies()->paginate(10);

        return view('company.company-list',[
            'companies' => $companies,
            'search_criteria' => '',
            'filters_category' => '',
            'filters_rating' => '',
            'emailsend' => $request->input('emailsend'),
            'emailverified' => $request->input('emailverified'),
        ]);
    }

    // public function showCompanyVerificationForm($company_slug)
    // {
    //     $company = Auth::user()->companies()->where(['slug' => $company_slug])->firstOrFail();

    //     return view('company.company-verify',[
    //         'company' => $company,

    //     ]);
    // }

    public function verifyCompanyEmail($company_slug,$code)
    {
        $company = Auth::user()->companies()->where(['slug' => $company_slug])->firstOrFail();
        if($company->email_verification_code == $code)
        {
            $company->email_verified_at = date('Y-m-d H:i:s');
            $company->save();
        }

        return redirect(route('companies.list',['emailverified'=>'success']));
    }

    public function verifyCompanySendCode($company_slug)
    {
        $company = Auth::user()->companies()->where(['slug' => $company_slug])->firstOrFail();

        if($company->email_verified_at === null)
        {
            $code = '';
            for($x=0;$x<=5;$x++)
            {
                $code .= rand(0,9);
            }
            $message["to"] = $company->email;
            $message["url"] = route('companies.verify',[$company->slug,$code]);

            $company->email_verification_code = $code;
            $company->save();

            $mail = Mail::send(new SendCompanyVerification($message));

            return redirect(route('companies.list',['emailsend'=>'success']));
        }

        return redirect(route('companies.list'));
    }

    public function showStepsToVerify()
    {
        return view('company.company-stepstoverify',[

        ]);
    }
}
