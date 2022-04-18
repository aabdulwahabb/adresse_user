<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\AdresseRolleController;
use App\Http\Controllers\XentralUserController;
use App\Http\Controllers\UserRightController;
use App\Http\Controllers\ProjektController;

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
/*
Route::get('/', function () {
    return view('welcome');
});*/
// Adresse Page
Route::get('/', [AdresseController::class, 'index'])->name('adresse.index');
Route::get('/create', [AdresseController::class, 'create'])->name('adresse.create');
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
