<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::post('password/email', [ForgotPasswordController::class, 'forgetPassword'])->name('password.forgot'); 
Route::get('password/email/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('password/confirm', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/home', [MenuController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/food', [ItemController::class, 'food'])->name('food');
Route::get('/drink', [ItemController::class, 'drink'])->name('drink');

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang-switch');