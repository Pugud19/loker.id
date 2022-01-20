<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\UpdateProfileInformationController;
use App\Http\Controllers\UpdatePasswordController;


Route::get('/', WelcomeController::class);


Route::middleware('auth')->group(function(){

    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('status', [StatusController::class, 'store'])->name('status.store');

    Route::get('explore', ExploreUserController::class)->name('users.index');
   
    // loker Route
    Route::get('loker', LokerController::class)->name('lokers');
    Route::post('job', [JobController::class, 'store'])->name('jobs.store');
    
    // profile Route
    Route::prefix('profile')->group(function () {

    Route::get('edit', [UpdateProfileInformationController::class ,'edit'])->name('profile.edit');
    Route::put('update', [UpdateProfileInformationController::class ,'update'])->name('profile.update');

    Route::get('password/edit', [UpdatePasswordController::class ,'edit'])->name('password.edit');
    Route::put('password/edit', [UpdatePasswordController::class ,'update']);

    Route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
    Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
    Route::get('{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware('auth');

    
    });
   
});
require __DIR__.'/auth.php';

