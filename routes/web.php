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

Route::get('/', [AdresseController::class, 'index'])->name('adresse');
Route::get('/{{ $adress->id }}', [AdresseController::class, 'show'])->name('adresse_show');
Route::get('/{{ $adress->id }}/edit', [AdresseController::class, 'edit'])->name('adresse_edit');
Route::get('/create', [AdresseController::class, 'create'])->name('adresse_create');
Route::get('/users', [XentralUserController::class, 'index'])->name('users');
