<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\AdresseRolleController;
use App\Http\Controllers\XentralUserController;
use App\Http\Controllers\UserRightController;
use App\Http\Controllers\ProjektController;
use App\Http\Controllers\SessionController;


//login
Route::get('/', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

// Adresse Page
Route::get('/adresse', [AdresseController::class, 'index'])->name('adresse.index');
Route::get('/adresse/create', [AdresseController::class, 'create'])->name('adresse.create');
Route::get('/adresse/{id}', [AdresseController::class, 'show'])->name('adresse.show');
Route::get('adresse/{id}/edit', [AdresseController::class, 'edit'])->name('adresse.edit');
// Store Adresse
    Route::post('adresse', [AdresseController::class, 'store']);
  //  Route::post('adresse', [AdresseRolleController::class, 'store']);

//Adresse Rolle Page
Route::get('/adresserolle/adresse/{id}', [AdresseRolleController::class, 'show'])->name('adresserolle.index');

// User Page
Route::get('/users', [XentralUserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [XentralUserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [XentralUserController::class, 'edit'])->name('user.edit');
// Store user
    //Route::post('adresse', [XentralUserController::class, 'store']);
// Projekt Page
Route::get('/projekte', [ProjektController::class, 'index'])->name('projekte.index');
// Userrights Page
Route::get('/userrights/users/{id}', [UserRightController::class, 'show'])->name('userrights.index');

//logout
Route::post('/', [SessionController::class, 'destroy'])->middleware('auth');
