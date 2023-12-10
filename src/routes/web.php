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
//Route::get('/works/create', [WorkController::class, 'create'])->name('works.create');
//Route::post('/works', [WorkController::class, 'store'])->name('works.store');
//Route::get('/cassers/create', [CasserController::class, 'create'])->name('cassers.create');
//Route::post('/cassers', [CasserController::class, 'store'])->name('cassers.store');
Route::group(['middleware' => 'auth'], function() {
    
    Route::post('/start_time', [WorkController::class,'start_time'])->name('work.start_time');
    Route::patch('/end_time', [WorkController::class,'end_time'])->name('work.end_time');
    Route::post('/start_time', [BreakingController::class,'start_time'])->name('breaking.start_time');
    Route::patch('/end_time', [BreakingController::class,'end_time'])->name('breaking.end_time');



});


