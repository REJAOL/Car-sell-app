<?php

use App\Http\Controllers\carController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/car/search', [carController::class, 'search'])->name('car.search');
Route::resource('car', carController::class);
Route::get('/signup', [SignupController::class , 'create'])->name('signup');
Route::get('/login', [LoginController::class , 'create'])->name('login');
