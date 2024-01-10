<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

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

Route::get('/', [CountryController::class, 'index']);

Route::get('/get-cities/{countryId}', [CitiesController::class, 'getCitiesByCountry']);

Route::post('/register', [RegisterController::class, 'index'])->name('register');


