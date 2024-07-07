<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscribeTransactionController;

Route::get('/', [FrontController::class, 'index'])->name('front'.'index');
Route::get('/details/{course:slug}', [FrontController::class, 'details'])->name('front'.'details');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('front'.'pricing');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout', [FrontController::class, 'checkout'])->name('front.checkout');
    Route::get('/checkout/store', [FrontController::class, 'checkout_store'])->name('front.checkout_store');

    Route::prefix('admin')->name('admin')->group(function(){
        Route::resource('categories', CategoryController::class)->middleware('role:owner');
        Route::resource('teacher', TeacherController::class)->middleware('role:owner');
        Route::resource('courses', CourseController::class)->middleware('role:owner|teacher');
        Route::resource('subscribe_transactions', SubscribeTransactionController::class)->middleware('role:owner');
        Route::resource('course_videos', SubscribeTransactionController::class)->middleware('role:owner|teacher');
    });
});

require __DIR__.'/auth.php';
