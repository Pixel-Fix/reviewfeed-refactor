<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blocked', [App\Http\Controllers\ProfileController::class, 'showBlocked'])->name('profile.blocked');

Route::get('/categories/{category_slug}', [App\Http\Controllers\ReviewController::class, 'showReviewsByCategory'])->name('reviews.categories');

Route::get('/companies',[App\Http\Controllers\CompanyController::class,'showCompanyLanding'])->name('companies.landing');
Route::get('/companies/search',[App\Http\Controllers\ReviewController::class,'searchCompany']);
Route::post('/companies/search',[App\Http\Controllers\ReviewController::class,'searchCompany'])->name('companies.search');
Route::get('/companies/steps-to-verify',[App\Http\Controllers\CompanyController::class,'showStepsToVerify'])->name('companies.stepstoverify');
Route::get('/companies/{company_slug}/reviews',[App\Http\Controllers\CompanyController::class,'showCompanyReviewsList'])->name('companies.reviews');

Route::get('/login/{provider}', [App\Http\Controllers\SocialLoginController::class,'redirectToProvider'])->name('login.provider');
Route::get('/login/{provider}/callback', [App\Http\Controllers\SocialLoginController::class, 'handleProviderCallback']);

Route::get('/disclaimer', [App\Http\Controllers\HomeController::class, 'showDisclaimer'])->name('disclaimer');
Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'showPrivacy'])->name('privacy');

Route::get('/reviews',[App\Http\Controllers\ReviewController::class,'showReviewList'])->name('reviews.list');
Route::post('/reviews',[App\Http\Controllers\ReviewController::class,'showReviewList']);
Route::get('/reviews/{review_slug}/view',[App\Http\Controllers\ReviewController::class,'showReviewDetail'])->name('reviews.detail');

Route::post('/newsletter/subscribe', [App\Http\Controllers\HomeController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/verify/{code}', [App\Http\Controllers\HomeController::class, 'verifyNewsletterSignup'])->name('newsletter.verify');

Route::middleware(['auth','verified','IsActive'])->group(function(){

    Route::get('/ajax/companies/name',[App\Http\Controllers\CompanyController::class,'searchCompanyName']);

    Route::get('/companies/create',[App\Http\Controllers\CompanyController::class,'showCompanyCreateForm'])->name('companies.create');
    Route::post('/companies/create',[App\Http\Controllers\CompanyController::class,'createCompany']);
    Route::get('/companies/list',[App\Http\Controllers\CompanyController::class,'showCompanyList'])->name('companies.list');
    Route::get('/companies/{company_slug}/update',[App\Http\Controllers\CompanyController::class,'showCompanyUpdateForm'])->name('companies.update');
    Route::post('/companies/{company_slug}/update',[App\Http\Controllers\CompanyController::class,'updateCompany']);
    Route::get('/companies/{company_slug}/verify',[App\Http\Controllers\CompanyController::class,'verifyCompanySendCode'])->name('companies.verify.sendcode');
    Route::get('/companies/{company_slug}/verify/{code}',[App\Http\Controllers\CompanyController::class,'verifyCompanyEmail'])->name('companies.verify');
    // Route::get('/companies/{company_slug}/verify/sendcode',[App\Http\Controllers\CompanyController::class,'verifyCompanySendCode'])->name('companies.verify.sendcode');
    // Route::post('/companies/update',[App\Http\Controllers\CompanyController::class,'updateCompany']);
    Route::post('/companies/{company_slug}/logo/update',[App\Http\Controllers\CompanyController::class,'updateCompanyLogo'])->name('companies.logo.update');

    Route::get('/profile/update',[App\Http\Controllers\ProfileController::class,'showProfileUpdateForm'])->name('profile.update');
    Route::post('/profile/update',[App\Http\Controllers\ProfileController::class,'updateProfile']);
    Route::get('/profile/password',[App\Http\Controllers\ProfileController::class,'showPasswordUpdateForm'])->name('profile.password');
    Route::post('/profile/password',[App\Http\Controllers\ProfileController::class,'updatePassword']);
    Route::get('/profile/reviews',[App\Http\Controllers\ProfileController::class,'showMyReviews'])->name('profile.reviews');
    Route::get('/profile/company/reviews',[App\Http\Controllers\ProfileController::class,'showMyCompanyReviews'])->name('profile.company.reviews');

    Route::get('/reviews/create',[App\Http\Controllers\ReviewController::class,'showCreateForm'])->name('reviews.create.step1');
    Route::post('/reviews/create',[App\Http\Controllers\ReviewController::class,'searchCompanyForReview']);
    Route::get('/reviews/{company_slug}/create',[App\Http\Controllers\ReviewController::class,'showReviewCreateForm'])->name('reviews.create.step2');
    Route::post('/reviews/{company_slug}/create',[App\Http\Controllers\ReviewController::class,'createReview']);
    Route::post('/reviews/{review_slug}/reply',[App\Http\Controllers\ReviewController::class,'replyReview'])->name('reviews.reply');

});

Route::middleware(['auth','verified','IsActive','IsAdmin'])->group(function(){

    Route::get('/admin',[App\Http\Controllers\AdminController::class,'showAdmin']);

    Route::get('/admin/categories/create',[App\Http\Controllers\AdminController::class,'showCategoriesCreateForm'])->name('admin.categories.create');
    Route::post('/admin/categories/create',[App\Http\Controllers\AdminController::class,'createCategory']);

    Route::get('/admin/companies',[App\Http\Controllers\AdminController::class,'showCompanyList'])->name('admin.company.list');
    Route::post('/admin/companies',[App\Http\Controllers\AdminController::class,'showCompanyList']);
    Route::get('/admin/companies/upload',[App\Http\Controllers\AdminController::class,'showCompanyUploadForm'])->name('admin.company.upload');
    Route::post('/admin/companies/upload',[App\Http\Controllers\AdminController::class,'uploadCompanies']);
    Route::get('/admin/companies/{company_slug}/verify',[App\Http\Controllers\AdminController::class,'verifyCompany'])->name('admin.company.verify');
    Route::get('/admin/companies/{company_slug}/verify-email',[App\Http\Controllers\AdminController::class,'verifyCompanyEmail'])->name('admin.company.verify-email');
    Route::get('/admin/companies/{company_slug}/assign',[App\Http\Controllers\AdminController::class,'showAssignCompany'])->name('admin.company.assign');
    Route::post('/admin/companies/{company_slug}/assign',[App\Http\Controllers\AdminController::class,'assignCompany']);

    Route::get('/admin/users',[App\Http\Controllers\AdminController::class,'showUserList'])->name('admin.user.list');
    Route::post('/admin/users',[App\Http\Controllers\AdminController::class,'showUserList']);
    Route::get('/admin/users/{user_id}/view',[App\Http\Controllers\AdminController::class,'showUserDetails'])->name('admin.user.view');
    Route::get('/admin/users/{user_id}/block',[App\Http\Controllers\AdminController::class,'blockUser'])->name('admin.user.block');
    Route::get('/admin/users/{user_id}/unblock',[App\Http\Controllers\AdminController::class,'unblockUser'])->name('admin.user.unblock');
});
