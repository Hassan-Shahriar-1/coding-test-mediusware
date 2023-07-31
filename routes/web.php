<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'home'])->name('home');

//registration routes
Route::get('/registration', [AuthController::class, 'registration'])->name('registration.page');
Route::post('/register', [AuthController::class, 'registerUser'])->name('registration');

//login routes
Route::get('login', [AuthController::class, 'loginPage'])->name('login.page');
