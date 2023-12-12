<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\BreakingController;

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


Route::get('/', function () {
    return view('home');
    })->middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    
    Route::post('Works/start_time', [WorkController::class,'start_time'])->name('work.start_time');
    Route::patch('Works/end_time', [WorkController::class,'end_time'])->name('work.end_time');
    Route::post('Breakings/start_time', [BreakingController::class,'start_time'])->name('breaking.start');
    Route::patch('Breakings/end_time', [BreakingController::class,'end_time'])->name('breaking.end');



});


