<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TripController;
use App\Http\Controllers\VolunteerController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('trip', TripController::class)->names('trip');

Route::get('/volunteer', [VolunteerController::class, 'volunteer'])->name('volunteer');

Route::get('/apply/{id}', [VolunteerController::class, 'apply'])->name('apply');
