<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobcontroller;


Route::get('',fn()=>to_route('jobs.index'));


Route::resource('jobs',Jobcontroller::class)->only(['index','show']);
