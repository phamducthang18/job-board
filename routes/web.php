<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobcontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MyJobApplicationController;



Route::get('',fn()=>to_route('jobs.index'));


Route::resource('jobs',Jobcontroller::class)->only(['index','show']);
Route::get('login',fn()=>to_route('auth.create'))->name('login');
Route::resource('auth',Authcontroller::class)->only(['create','store']);
Route::delete('logout',fn()=>to_route('auth.destroy'))->name('logout');
Route::delete('auth',[Authcontroller::class,'destroy'])->name('auth.destroy');

Route::middleware('auth')->group(function () {
    Route::resource('job.applications', JobApplicationController::class)->only(['create','store']);
    Route::resource('my-job-application', MyJobApplicationController::class)->only(['index','destroy']);
});
