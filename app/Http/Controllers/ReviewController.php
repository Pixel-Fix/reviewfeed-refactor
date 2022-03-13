<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Review;
use App\Models\ReviewReply;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function showCreateForm()
    {
        // Review Step 1

        $reviews = Review::orderBy('created_at','desc')
                        ->take(5)
                        ->get();

        return view('reviews.review-create-step1',[
            'reviews' => $reviews
        ]);
    }

    public function searchCompanyForReview(Request $request)
    {
        // Review Step 2
        $this->validate($request,[
            'company' => 'required | string '
        ]);

        // | regex:/^[A-Za-z0-9\s]+$/

        $company = Company::firstOrCreate([
            'slug' => Str::slug(strip_tags($request->input('company')))
        ],[
            'name' => ucwords(strtolower($request->input('company'))),
            'slug' => Str::slug(strip_tags($request->input('company'))),
            'active' => false,
        ]);

        return redirect(route('reviews.create.step2',['company_slug'=>$company->slug]));
    }

    public function showReviewCreateForm($company_slug)
    {
        $company = Company::where('slug',$company_slug)
                        ->firstOrFail();
        $reviews = $company->reviews()->take(2)->get();
        $categories = Category::orderBy('name','asc')
                            ->get();
        return view('reviews.review-create-step2',[
            'company' => $company,
            'reviews' => $reviews,
            'categories' => $categories,
        ]);
    }

    public function createReview(Request $request, $company_slug)
    {
        // $request->location = strip_tags($request->input('location'));
        // $request->title = strip_tags($request->input('title'));
        // $request->description = strip_tags($request->input('description'));

        $this->validate($request,[
            'rating' => 'required | numeric',
            'category' => 'required | numeric',
            'location' => 'required | string | max:255',
            'title' => 'required | string | min:10 | max:255',
            'description' => 'required | string | min:50',
            'terms' => 'required | string',
        ]);

        $company = Company::where('slug',$company_slug)->firstOrFail();

        $review = new Review;
        $review->user_id = Auth::id();
        $review->company_id = $company->id;
        $review->company_name = $company->name;
        $review->category_id = $request->input('category');
        $review->location = $request->input('location');
        $review->title = $request->input('title');
        $review->description = $request->input('description');
        $review->rating_id = $request->input('rating');
        $review->save();

        $review->slug = $review->id."-".Str::slug($request->input('title'));
        $review->save();

        $reviews = $company->reviews()->orderBy('created_at','desc')->take(2)->get();

        return redirect(route('companies.reviews',$company->slug));
    }

    public function showReviewList(Request $request)
    {
        $search_criteria = $request->input('search_criteria');
        // $filters_listing = $request->input('filters_listing');
        $filters_category = $request->input('filters_category');
        ($request->input('filters_rating') !== null) ? ($filters_rating = $request->input('filters_rating')) : ($filters_rating = 0);
        // var_dump($search_criteria );
        // var_dump($filters_listing);
        // var_dump($filters_category);
        // exit;

        if(($search_criteria === null) && ($filters_category === null) && ($filters_rating == 0))
        {
            $reviews = Review::orderBy('created_at','desc')
                        ->paginate(10);

        }
        else
        {
            if(($filters_category == 'all') || ($filters_category === null))
            {
                $reviews = Review::orWhere(function($query) use ($search_criteria) {
                            $query->where('title','like','%'.str_replace(" ","%",$search_criteria).'%')
                                  ->orWhere('company_name','like','%'.str_replace(" ","%",$search_criteria).'%');
                        })
                        ->where('rating_id','>=',$filters_rating)
                        ->orderBy('created_at','desc')
                        ->paginate(10);
            }
            else
            {
                $reviews = Review::orWhere(function($query) use ($search_criteria) {
                            $query->where('title','like','%'.str_replace(" ","%",$search_criteria).'%')
                                ->orWhere('company_name','like','%'.str_replace(" ","%",$search_criteria).'%');
                        })
                        ->where('category_id',$filters_category)
                        ->where('rating_id','>=',$filters_rating)
                        ->orderBy('created_at','desc')
                        ->paginate(10);
            }
        }

        $ratings = Rating::orderBy('id','asc')->get();

        $categories = Category::orderBy('name','asc')
                            ->get();
        return view('reviews.review-list',[
            'reviews' => $reviews,
            'search_criteria' => $search_criteria,
            'page_title' => 'Search Results for '.$search_criteria,
            'categories' => $categories,
            // 'filters_listing' => $filters_listing,
            'filters_category' => $filters_category,
            'filters_rating' => $filters_rating,
            'ratings' => $ratings,
        ]);
    }

    public function showReviewDetail($review_slug)
    {
        $array = explode("-",$review_slug,2);
        if($array[0] !== null)
        {
            //array[0] is the review id
            $review = Review::findOrFail($array[0]);
        }
        else
        {
            abort(404);
        }

        $company = Company::where('id',$review->company_id)
                        ->firstOrFail();
        //$company->get_review_stats();

        return view('reviews.review-detail',[
            'review' => $review,
            'company' => $company,
            'page_title' => $review->title,
            'image' => $company->image,
            'page_description' => Str::limit($review->description,300),
        ]);
    }

    public function replyReview(Request $request, $review_slug)
    {
        $this->validate($request,[
            'description' => 'required | min:20',
        ]);

        $array = explode("-",$review_slug,2);
        if($array[0] !== null)
        {
            //array[0] is the review id
            $review = Review::where('id',$array[0])->firstOrFail();
            if(($review->company->user_id == Auth::id()) || ($review->user_id == Auth::id()))
            {
                $reply = new ReviewReply;
                $reply->review_id = $review->id;
                $reply->user_id = Auth::id();
                $reply->title = 'Reply';
                $reply->description = $request->input('description');
                $reply->save();
            }

            return redirect(route('reviews.detail',[$review_slug]));
        }
        else
        {
            abort(404);
        }

    }

    public function showReviewsByCategory(Request $request, $category_slug)
    {
        $search_criteria = $request->input('search_criteria');
        // $filters_listing = $request->input('filters_listing');
        $filters_category = $request->input('filters_category');
        ($request->input('filters_rating') !== null) ? ($filters_rating = $request->input('filters_rating')) : ($filters_rating = 0);

        $category = Category::where('slug',$category_slug)
                            ->firstOrFail();

        $reviews = Review::where('category_id',$category->id)
                        ->orderBy('created_at','desc')
                        ->paginate(10);
        $categories = Category::orderBy('name','asc')
                        ->get();
        $ratings = Rating::orderBy('id','asc')->get();

        return view('reviews.review-list',[
            'reviews' => $reviews,
            'search_criteria' => null,
            'page_title' => 'Search Results for '.$category->name,
            'categories' => $categories,
            'filters_category' => $filters_category,
            'filters_rating' => $filters_rating,
            'ratings' => $ratings,
        ]);
    }

    public function searchCompany(Request $request)
    {
        if($request->input('company') !== null)
        {
            $companies = Company::whereRaw('MATCH (name) AGAINST (?)',$request->input('company'))
                                ->paginate(15);
        }
        else
        {
            $companies = Company::orderBy('name','asc')
                                ->paginate(15);
        }


        return view('reviews.company-list',[
            'companies' => $companies,
            'search_criteria' => $request->input('search_criteria'),
        ]);
    }
}
