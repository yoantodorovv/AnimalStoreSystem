<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

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

Route::resource('animals', AnimalController::class);

// Configure Authentication routes
Route::get('register', [AuthenticationController::class, 'registerGet'])->name('register');
Route::post('register', [AuthenticationController::class, 'registerPost']);
Route::get('login', [AuthenticationController::class, 'loginGet'])->name('login');
Route::post('login', [AuthenticationController::class, 'loginPost']);
Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');

