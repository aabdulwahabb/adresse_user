<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\AdresseRolleController;
use App\Http\Controllers\XentralUserController;
use App\Http\Controllers\UserRightController;
use App\Http\Controllers\ProjektController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\LoginController;

// Login
Route::namespace('Auth')->group(function () {
  Route::get('/login',[LoginController::class, 'show_login_form'])->name('show_login_form');
    Route::get('/register',[LoginController::class, 'show_register_form'])->name('show_register_form');
  Route::post('/users/login',[LoginController::class, 'customLogin'])->name('process_login');
    Route::post('/users/register',[LoginController::class, 'customRegister'])->name('process_register');
  Route::get('users/logout',[LoginController::class, 'signOut'])->name('logout');
});
// Update Admin
Route::get('users/setting/admin/id={id}/edit', [LoginController::class, 'editadmin'])->name('admin.edit'); // Bearbeiten
Route::put('/users/setting/admin',[LoginController::class, 'updateadmin']);       // Update Admin

// User Page
Route::get('/users', [XentralUserController::class, 'index'])->name('users.index'); // Startseite
Route::get('/users/setting', [XentralUserController::class, 'setting'])->name('users.setting'); // Setting
Route::get('/users/create', [XentralUserController::class, 'create'])->name('users.create'); // create user adresse and rolle and userright
Route::get('/users/id={id}', [XentralUserController::class, 'show'])->name('users.show'); // Mitarbeiterkarte
Route::get('/users/id={id}/edit', [XentralUserController::class, 'edit'])->name('user.edit'); // Bearbeiten

// Store adresse and user, adresse_rolle, userright
Route::post('/users', [XentralUserController::class, 'store']);            // store benutzer

// Update User
Route::put('/users',[XentralUserController::class, 'update']);       // Update User
Route::put('/users/setting', [XentralUserController::class, 'updatemanummer']); // Updatenummernkreis
Route::get('/users/setting/admin/status', [XentralUserController::class, 'changeAdminStatus'])->name('/changeAdminStatus'); // Admin or not admin
Route::get('/users/setting/status', [XentralUserController::class, 'benutzerStatus'])->name('/changeStatus'); // normale Xentral Benutzer Status aktualisieren
