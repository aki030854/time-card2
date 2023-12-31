<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\BreakingController;
use App\Http\Controllers\ListController;

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

Route::get('/fortify/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
    
Route::group(['middleware' => 'auth'], function() {
    
    Route::post('Works/punchin', [WorkController::class,'punchin'])->name('work.punchin');
    Route::patch('Works/punchout', [WorkController::class,'punchout'])->name('work.punchout');
    Route::post('Breakings/start_time', [BreakingController::class,'start_time'])->name('breaking.start_time');
    Route::patch('Breakings/end_time', [BreakingController::class,'end_time'])->name('breaking.end_time');
});

Route::get('list', [ListController::class,'index'])->name('list.index');



