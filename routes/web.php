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

Route::get('/login/{provider}', [App\Http\Controllers\SocialLoginController::class,'redirectToProvider'])->name('login.provider');
Route::get('/login/{provider}/callback', [App\Http\Controllers\SocialLoginController::class, 'handleProviderCallback']);

Route::get('/disclaimer', [App\Http\Controllers\HomeController::class, 'showDisclaimer'])->name('disclaimer');
Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'showPrivacy'])->name('privacy');

Route::post('/newsletter/subscribe', [App\Http\Controllers\HomeController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/verify/{code}', [App\Http\Controllers\HomeController::class, 'verifyNewsletterSignup'])->name('newsletter.verify');

Route::middleware(['auth','verified','IsActive'])->group(function(){
    Route::get('/profile/update',[App\Http\Controllers\ProfileController::class,'showProfileUpdateForm'])->name('profile.update');
    Route::post('/profile/update',[App\Http\Controllers\ProfileController::class,'updateProfile']);
    Route::get('/profile/password',[App\Http\Controllers\ProfileController::class,'showPasswordUpdateForm'])->name('profile.password');
    Route::post('/profile/password',[App\Http\Controllers\ProfileController::class,'updatePassword']);
    Route::get('/profile/reviews',[App\Http\Controllers\ProfileController::class,'showMyReviews'])->name('profile.reviews');
    Route::get('/profile/company/reviews',[App\Http\Controllers\ProfileController::class,'showMyCompanyReviews'])->name('profile.company.reviews');
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
