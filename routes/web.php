<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositeController;
use App\Http\Controllers\TransectionController;
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



//registration routes
Route::get('/registration', [AuthController::class, 'registration'])->name('registration.page');
Route::post('/register', [AuthController::class, 'registerUser'])->name('registration');

//login routes
Route::get('login-page', [AuthController::class, 'loginPage']);
Route::post('login', [AuthController::class, 'login'])->name('login');

//logged in user routes
Route::group(['middleware' => 'auth'], function () {
    //deposite part
    Route::get('/', [UserController::class, 'home'])->name('deposite.list');
    Route::get('/transection-list', [TransectionController::class, 'getAllTransectionList'])->name('transection.ajax-list');
    Route::get('deposite', [TransectionController::class, 'depositeList'])->name('deposite.list');
});
