<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomepageController::class, 'index'])->middleware('guest');

Route::get('/get-cities/{countryId}', [CitiesController::class, 'getCitiesByCountry'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/password/reset', [PasswordResetController::class, 'reset'])->name('password_request');
Route::post('/password/reset', [PasswordResetController::class, 'send']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
