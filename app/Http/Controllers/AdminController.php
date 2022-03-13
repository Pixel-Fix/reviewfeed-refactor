<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    //
    public function showAdmin()
    {
        echo "this is admin";
    }

    public function showCategoriesCreateForm()
    {

        return view('admin.categories-create',[

        ]);
    }

    public function createCategory(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | min:3 | max:255',
            'image' => 'required|mimes:jpeg,png,webp'
        ]);

        if($request->hasFile('image'))
        {
            $category = Category::firstOrNew(['name' => $request->input('name')]);
            $category->name = $request->input('name');
            $category->slug = Str::slug($request->input('name'));
            $category->image = Image::make($request->file('image'))->resize(null,400,function($constraint){
                $constraint->aspectRatio();
            })->crop(400,400)->encode('data-url');
            $category->save();
        }

        session()->flash('action_message','category_create_success');
        return redirect(route('admin.categories.create'));
    }

    public function showCompanyList(Request $request)
    {
        if($request->input('company') !== null)
        {
            $companies = Company::whereRaw('MATCH (name) against (?)',$request->input('company'))
                        ->orderBy('active','asc')
                        ->orderBy('name','asc')->paginate(10);
        }
        else
        {
            $companies = Company::orderBy('active','asc')
                        ->orderBy('name','asc')->paginate(10);
        }

        return view('admin.company-list',[
            'companies' => $companies,
            'search_criteria' => '',
            'filters_category' => '',
            'filters_rating' => '',
            'emailsend' => $request->input('emailsend'),
            'emailverified' => $request->input('emailverified'),
        ]);
    }

    public function verifyCompany($company_slug)
    {
        $company = Company::where('slug',$company_slug)->firstOrFail();
        if(($company->email_verified_at !== null) && ($company->user !== null))
        {
            $company->active = true;
            $company->save();
        }

        return redirect(route('admin.company.list',[
            'company' => $company->name,
        ]));
    }

    public function verifyCompanyEmail($company_slug)
    {
        $company = Company::where('slug',$company_slug)->firstOrFail();
        if($company->email_verified_at === null)
        {
            $company->email_verified_at = date('Y-m-d H:i:s');
            $company->save();
        }

        return redirect(route('admin.company.list',[
            'company' => $company->name,
        ]));
    }

    public function showAssignCompany($company_slug)
    {
        $company = Company::where('slug',$company_slug)->firstOrFail();

        return view('admin.company-assign',[
            'company' => $company,
        ]);
    }

    public function assignCompany(Request $request, $company_slug)
    {
        $this->validate($request,[
            'email' => 'required | email'
        ]);
        $company = Company::where('slug',$company_slug)->firstOrFail();
        $user = User::where('email',$request->input('email'))->firstOrFail();

        $company->user_id = $user->id;
        $company->save();

        $assignMessage = 'You have successfully assign "'.$company->name.'" to "'.$user->fullname().'"';

        return view('admin.company-assign',[
            'company' => $company,
            'assignMessage' => $assignMessage,
        ]);
    }

    public function showUserList(Request $request)
    {
        if($request->input('search_criteria') !== null)
        {
            $users = User::where('firstname','like',$request->input('search_criteria')."%")
                        ->orWhere('lastname','like',$request->input('search_criteria')."%")
                        ->orWhere('email','like',$request->input('search_criteria')."%")
                        ->orderBy('firstname', 'asc')->paginate(15);
        }
        else
        {
            $users = User::orderBy('firstname', 'asc')->paginate(15);
        }

        return view('admin.users-list',[
            'users' => $users,
            'search_criteria' => '',
        ]);
    }

    public function showUserDetails($user_id)
    {

    }

    public function blockUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->is_active = false;
        $user->save();

        return redirect(route('admin.user.list'));
    }

    public function unblockUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->is_active = true;
        $user->save();

        return redirect(route('admin.user.list'));
    }

    public function showCompanyUploadForm()
    {
        return view('admin.company-upload',[

        ]);
    }

    public function uploadCompanies(Request $request)
    {
        if($request->hasFile('companyfile'))
        {
            $file = $request->file('companyfile');
            if(($handle = fopen($file,'r')) !== null)
            {
                while(!feof($handle))
                {
                    $array = fgetcsv($handle);
                    if(($array !== null) && (gettype($array) == 'array'))
                    {
                        $company = Company::where('name', $array[0])->first();
                        if($company === null)
                        {
                            $new_company = new Company;
                            $new_company->name = ucwords(strtolower($array[0]));
                            $new_company->slug = Str::slug($array[0]);
                            $new_company->category_id = $array[1];
                            $new_company->save();
                        }
                    }
                }
            }

            session()->flash('action_message','company_upload_success');
        }

        return redirect(route('admin.company.upload'));
    }
}
