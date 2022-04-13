<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\AdresseRolleController;
use App\Http\Controllers\XentralUserController;
use App\Http\Controllers\UserRightController;

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


// User Page
Route::get('/users', [XentralUserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [XentralUserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [XentralUserController::class, 'edit'])->name('user.edit');
