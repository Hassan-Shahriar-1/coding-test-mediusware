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
Route::get('login', [AuthController::class, 'loginPage']);
Route::post('login', [AuthController::class, 'login'])->name('login');

//logged in user routes
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [UserController::class, 'home'])->name('deposite.list');
    Route::get('/transection-list', [TransectionController::class, 'getAllTransectionList'])->name('transection.ajax-list');

    //deposite part
    Route::get('deposite', [TransectionController::class, 'depositeList'])->name('deposite.list');
    Route::post('/deposite', [TransectionController::class, 'storeDeposite'])->name('deposite');

    //withdraw part
    Route::get('withdraw', [TransectionController::class, 'withdrawList'])->name('withdraw.list');
    Route::post('withdraw', [TransectionController::class, 'withDrawBalance'])->name('withdraw');
});
