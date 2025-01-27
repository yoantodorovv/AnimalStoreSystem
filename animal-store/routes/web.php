<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AnimalController;
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

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function() {
    // Admin Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Manage Animals
    Route::get('animals', [AdminController::class, 'manageAnimals'])->name('admin.animals.index');
    Route::get('animals/create', [AdminController::class, 'createAnimal'])->name('admin.animals.create');
    Route::post('animals', [AdminController::class, 'storeAnimal'])->name('admin.animals.store');
    Route::get('animals/{animal}/edit', [AdminController::class, 'editAnimal'])->name('admin.animals.edit');
    Route::put('animals/{animal}', [AdminController::class, 'updateAnimal'])->name('admin.animals.update');
    Route::delete('animals/{animal}', [AdminController::class, 'deleteAnimal'])->name('admin.animals.delete');

    // Manage Breeds
    Route::get('breeds', [AdminController::class, 'manageBreeds'])->name('admin.breeds.index');
    Route::get('breeds/create', [AdminController::class, 'createBreed'])->name('admin.breeds.create');
    Route::post('breeds', [AdminController::class, 'storeBreed'])->name('admin.breeds.store');
    Route::get('breeds/{breed}/edit', [AdminController::class, 'editBreed'])->name('admin.breeds.edit');
    Route::put('breeds/{breed}', [AdminController::class, 'updateBreed'])->name('admin.breeds.update');
    Route::delete('breeds/{breed}', [AdminController::class, 'deleteBreed'])->name('admin.breeds.delete');

    // Manage Species
    Route::get('species', [AdminController::class, 'manageSpecies'])->name('admin.species.index');
    Route::get('species/create', [AdminController::class, 'createSpecie'])->name('admin.species.create');
    Route::post('species', [AdminController::class, 'storeSpecie'])->name('admin.species.store');
    Route::get('species/{specie}/edit', [AdminController::class, 'editSpecie'])->name('admin.species.edit');
    Route::put('species/{specie}', [AdminController::class, 'updateSpecie'])->name('admin.species.update');
    Route::delete('species/{specie}', [AdminController::class, 'deleteSpecie'])->name('admin.species.delete');

    // Manage Users
    Route::get('users', [AdminController::class, 'manageUsers'])->name('admin.users.index');
    Route::get('users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
});
