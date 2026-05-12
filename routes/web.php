<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

/* BUYER */
use App\Http\Controllers\Dashboard\Buyer\BuyerController;
use App\Http\Controllers\Dashboard\Buyer\OrderController;
use App\Http\Controllers\Dashboard\Buyer\FavoriteController;

/* SELLER */
use App\Http\Controllers\Dashboard\Seller\SellerController;
use App\Http\Controllers\Dashboard\Seller\PetController as SellerPetController;
use App\Http\Controllers\Dashboard\Seller\ListingController;

/* FRONT LISTINGS (public pets page) */
use App\Http\Controllers\Front\ListingController as FrontListingController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PUBLIC PETS / LISTINGS
|--------------------------------------------------------------------------
*/

Route::get('/pets', [FrontListingController::class, 'index'])->name('pets');
Route::get('/pets/{id}', [SellerPetController::class, 'show'])->name('pets.petsShow');
Route::get('/petsList', [FrontListingController::class, 'index'])->name('petsList');

/*
|--------------------------------------------------------------------------
| PROFILE (COMMON BUYER + SELLER)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

});

/*
|--------------------------------------------------------------------------
| BUYER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('buyer')
    ->name('buyer.')
    ->group(function () {

        Route::get('/dashboard', [BuyerController::class, 'index'])->name('dashboard');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::post('/buy/{id}', [OrderController::class, 'buy'])->name('buy');

        Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
        Route::post('/favorites/{id}', [FavoriteController::class, 'store'])->name('favorites.add');
        Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.delete');

        Route::get('/dernieres-achats', [BuyerController::class, 'dernieresAchats'])
            ->name('dernieres-achats');

        Route::get('/historique', [BuyerController::class, 'historique'])
            ->name('historique');
    });

/*
|--------------------------------------------------------------------------
| SELLER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        Route::get('/dashboard', [SellerController::class, 'index'])->name('dashboard');

        /* PETS */
        Route::get('/pets', [SellerPetController::class, 'index'])->name('pets');
        Route::get('/pets/create', [SellerPetController::class, 'create'])->name('pets.create');
        Route::post('/pets', [SellerPetController::class, 'store'])->name('pets.store');
        Route::get('/pets/{id}', [PetController::class, 'show'])->name('pets.petsShow');
        Route::get('/pets/{id}/edit', [SellerPetController::class, 'edit'])->name('pets.edit');
        Route::put('/pets/{id}', [SellerPetController::class, 'update'])->name('pets.update');
        Route::delete('/pets/{id}', [SellerPetController::class, 'destroy'])->name('pets.delete');

        /* LISTINGS */
        Route::get('/annonces', [ListingController::class, 'index'])->name('listings');
        Route::get('/annonces/create', [ListingController::class, 'create'])->name('listings.create');
        Route::post('/annonces', [ListingController::class, 'store'])->name('listings.store');
        Route::get('/annonces/{id}/edit', [ListingController::class, 'edit'])->name('listings.edit');
        Route::put('/annonces/{id}', [ListingController::class, 'update'])->name('listings.update');
        Route::delete('/annonces/{id}', [ListingController::class, 'destroy'])->name('listings.delete');

        /* EXTRA */
        Route::get('/historique', [SellerController::class, 'historique'])->name('historique');
        Route::get('/messages', [SellerController::class, 'messages'])->name('messages');
    });

    Route::middleware('auth')->group(function () {
    Route::post('/buy/{id}', [OrderController::class, 'buy'])->name('buyer.buy');
    });