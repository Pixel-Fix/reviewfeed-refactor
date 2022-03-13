<?php

use Illuminate\Support\Facades\Route;

Route::get('/companies',[App\Http\Controllers\CompanyController::class,'showCompanyLanding'])->name('companies.landing');
Route::get('/companies/search',[App\Http\Controllers\ReviewController::class,'searchCompany']);
Route::post('/companies/search',[App\Http\Controllers\ReviewController::class,'searchCompany'])->name('companies.search');
Route::get('/companies/steps-to-verify',[App\Http\Controllers\CompanyController::class,'showStepsToVerify'])->name('companies.stepstoverify');
Route::get('/companies/{company_slug}/reviews',[App\Http\Controllers\CompanyController::class,'showCompanyReviewsList'])->name('companies.reviews');


Route::middleware(['auth','verified','IsActive'])->group(function(){
    Route::get('/ajax/companies/name',[App\Http\Controllers\CompanyController::class,'searchCompanyName']);

    Route::get('/companies/create',[App\Http\Controllers\CompanyController::class,'showCompanyCreateForm'])->name('companies.create');
    Route::post('/companies/create',[App\Http\Controllers\CompanyController::class,'createCompany']);
    Route::get('/companies/list',[App\Http\Controllers\CompanyController::class,'showCompanyList'])->name('companies.list');
    Route::get('/companies/{company_slug}/update',[App\Http\Controllers\CompanyController::class,'showCompanyUpdateForm'])->name('companies.update');
    Route::post('/companies/{company_slug}/update',[App\Http\Controllers\CompanyController::class,'updateCompany']);
    Route::get('/companies/{company_slug}/verify',[App\Http\Controllers\CompanyController::class,'verifyCompanySendCode'])->name('companies.verify.sendcode');
    Route::get('/companies/{company_slug}/verify/{code}',[App\Http\Controllers\CompanyController::class,'verifyCompanyEmail'])->name('companies.verify');
    Route::post('/companies/{company_slug}/logo/update',[App\Http\Controllers\CompanyController::class,'updateCompanyLogo'])->name('companies.logo.update');

});
