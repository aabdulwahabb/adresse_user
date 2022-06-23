<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\AdresseRolleController;
use App\Http\Controllers\XentralUserController;
use App\Http\Controllers\UserRightController;
use App\Http\Controllers\ProjektController;
// use App\Http\Controllers\FillterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;

//login
Route::get('/', [SessionController::class, 'create'])->middleware('guest');
Route::post('/adresse', [SessionController::class, 'authenticate'])->middleware('guest');

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
Route::post('/search', [SearchController::class, 'search'])->name('search'); // Search
Route::get('/status', [SearchController::class, 'fillter'])->name('status'); // status aktiv Inaktiv

// Update User
Route::post('/update',[XentralUserController::class, 'update']); // Update

//logout
Route::post('/', [SessionController::class, 'logout'])->middleware('auth');
