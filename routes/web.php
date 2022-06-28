<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\AdresseRolleController;
use App\Http\Controllers\XentralUserController;
use App\Http\Controllers\UserRightController;
use App\Http\Controllers\ProjektController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SearchController;
/*
// Adresse Page
Route::get('/adresse', [AdresseController::class, 'index'])->name('adresse.index'); // index adresse
Route::get('/adresse/id={id}', [AdresseController::class, 'show'])->name('adresse.show');
Route::get('adresse/id={id}/edit', [AdresseController::class, 'edit'])->name('adresse.edit');
//Adresse Rolle Page
Route::get('/adresserolle/adresse/id={id}', [AdresseRolleController::class, 'show'])->name('adresserolle.index');
// Projekt Page
Route::get('/projekte', [ProjektController::class, 'index'])->name('projekte.index');
// Userrights Page
Route::get('/userrights/users/{id}', [UserRightController::class, 'show'])->name('userrights.index');
*/


// User Page
Route::get('/users', [XentralUserController::class, 'index'])->name('users.index'); // Startseite
Route::get('/users/create', [XentralUserController::class, 'create'])->name('adresse.create'); // create user adresse and rolle and userright
Route::get('/users/id={id}', [XentralUserController::class, 'show'])->name('users.show'); // Mitarbeiterkarte
Route::get('/users/id={id}/edit', [XentralUserController::class, 'edit'])->name('user.edit'); // Bearbeiten


// Store adresse and user, adresse_rolle, userright
Route::post('/users', [XentralUserController::class, 'store']); // store
Route::get('/status', [SearchController::class, 'search'])->name('status'); // Search status aktiv Inaktiv

// Update User
Route::put('/users/id={id}',[XentralUserController::class, 'update']); // Update





