<?php

use Illuminate\Support\Facades\Route;

Route::get('/reviews',[App\Http\Controllers\ReviewController::class,'index'])->name('reviews.list');
Route::post('/reviews',[App\Http\Controllers\ReviewController::class,'index']);
Route::get('/reviews/{review_slug}/view',[App\Http\Controllers\ReviewController::class,'showReviewDetail'])->name('reviews.detail');

Route::middleware(['auth','verified','IsActive'])->group(function(){
    Route::get('/reviews/create',[App\Http\Controllers\ReviewController::class,'showCreateForm'])->name('reviews.create.step1');
    Route::post('/reviews/create',[App\Http\Controllers\ReviewController::class,'searchCompanyForReview']);
    Route::get('/reviews/{company_slug}/create',[App\Http\Controllers\ReviewController::class,'showReviewCreateForm'])->name('reviews.create.step2');

    Route::post('/reviews/{company:slug}/create',[App\Http\Controllers\ReviewController::class,'store']);

    Route::post('/reviews/{review_slug}/reply',[App\Http\Controllers\ReviewController::class,'replyReview'])->name('reviews.reply');
});
