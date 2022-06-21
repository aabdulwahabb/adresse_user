<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\AdresseRolleController;
use App\Http\Controllers\XentralUserController;
use App\Http\Controllers\UserRightController;
use App\Http\Controllers\ProjektController;
use App\Http\Controllers\FillterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;


//login
Route::get('/', [SessionController::class, 'create'])->middleware('guest');

        Route::post('/adresse', [SessionController::class, 'authenticate'])->middleware('guest');

// Adresse Page
Route::get('/adresse', [AdresseController::class, 'index'])->name('adresse.index');
Route::get('/adresse/create', [AdresseController::class, 'create'])->name('adresse.create');
Route::get('/adresse/id={id}', [AdresseController::class, 'show'])->name('adresse.show');
Route::get('adresse/id={id}/edit', [AdresseController::class, 'edit'])->name('adresse.edit');

// Store Adresse
        Route::post('/users/{id}', [AdresseController::class, 'store']);

//Adresse Rolle Page
Route::get('/adresserolle/adresse/id={id}', [AdresseRolleController::class, 'show'])->name('adresserolle.index');

// User Page
Route::get('/users', [XentralUserController::class, 'index'])->name('users.index'); // Startseite
// Route::post('/users', [SearchController::class, 'search'])->name('search'); // Search
Route::get('/users/id={id}', [XentralUserController::class, 'show'])->name('users.show'); // Mitarbeiterkarte
Route::get('/users/id={id}/edit', [XentralUserController::class, 'edit'])->name('user.edit'); // Bearbeiten

// Store User
        Route::post('/users',[XentralUserController::class, 'update']);


// Projekt Page
Route::get('/projekte', [ProjektController::class, 'index'])->name('projekte.index');

// Userrights Page
Route::get('/userrights/users/{id}', [UserRightController::class, 'show'])->name('userrights.index');

//logout
        Route::post('/', [SessionController::class, 'logout'])->middleware('auth');
