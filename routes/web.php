<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Page d'accueil publique (accessible à tous)
Route::get('/', function () {
    return view('home'); 
})->name('home');

// Dashboard (accessible uniquement après connexion)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Redirection après connexion
Route::get('/home', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

// Authentification
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pets', [PetController::class, 'index'])->name('pets');
Route::get('/pets/{id}', [PetController::class, 'show'])->name('pets.showPets');


