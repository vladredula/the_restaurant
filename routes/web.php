<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ItemController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/food', [ItemController::class, 'food'])->name('food');
Route::get('/food/{category}', [ItemController::class, 'get_food'])->name('get_food');


Route::get('/drink', [ItemController::class, 'drink'])->name('drink');
