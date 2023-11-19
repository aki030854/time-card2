<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimestampsController;
use App\Http\Controllers\CassersController;

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
    
    Route::post('/punchin', [TimestampsController::class,"punchIn"])->name('timestamp/punchin');
    Route::post('/timestamps/punchout', [TimestampsController::class,'punchOut'])->name('timestamp/punchout');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('/casserstart', [CassersController::class,'casserstart'])->name('casser/casserstart');
    Route::post('/casserend', [CassersController::class,'casserend'])->name('casser/casserend');
});