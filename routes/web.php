<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ListingController;

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

    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    
    // Routes Buyer
    Route::prefix('buyer')->name('dashboard.buyer.')->group(function () {
        Route::get('/historique', [DashboardController::class, 'buyerHistorique'])->name('historique');
        Route::get('/profile', [DashboardController::class, 'buyerProfile'])->name('profile');
        Route::put('/profile', [DashboardController::class, 'buyerUpdateProfile'])->name('profile.update');
        Route::get('/dernieres-achats', [DashboardController::class, 'buyerDerniersAchats'])->name('dernieres-achats');
    });

    // Routes Seller
    Route::prefix('seller')->name('dashboard.seller.')->group(function () {
        Route::get('/annonces', [ListingController::class, 'index'])->name('annonces');
        Route::get('/add-annonce', [ListingController::class, 'create'])->name('add-annonce');
        Route::post('/add-annonce', [ListingController::class, 'store'])->name('store-annonce');

        Route::get('/historique', [ListingController::class, 'sellerHistorique'])->name('historique');
        Route::get('/messages', [DashboardController::class, 'sellerMessages'])->name('messages');
        Route::get('/profile', [DashboardController::class, 'sellerProfile'])->name('profile');
    });

});
// Authentification
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pets', [PetController::class, 'index'])->name('pets');
Route::get('/pets/{id}', [PetController::class, 'show'])->name('pets.petsShow');

Route::get('/petsList', [PetController::class, 'index'])->name('petsList');

