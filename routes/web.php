<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TempleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\UserController;

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

Route::get('/temples/alltemples', [TempleController::class, 'alltemples'])->name('temples.alltemples');
Route::resource('temples', TempleController::class);
Route::get('/index', function () {
    return view('index');
})->name('index');
Route::get('/', [TempleController::class, 'index'])->name('temple.index');
Route::get('/search', [TempleController::class, 'search'])->name('search');
Route::post('/temples', [TempleController::class, 'store'])->name('temples.store');
Route::delete('/temples/{id}', [TempleController::class, 'destroy'])->name('temples.destroy');
Route::get('/temples/{id}/edit', [TempleController::class, 'edit'])->name('temples.edit');
Route::put('/temples/{id}', [TempleController::class, 'update'])->name('temples.update');
Route::get('/temples/create', [TempleController::class, 'create'])->name('temples.create');
Route::get('/temples/{id}', [TempleController::class, 'show'])->name('temples.show');

Route::get('/login', function () {
    return view('login.loginPage');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [LoginController::class, 'register'])->name('login.register');

Route::post('/logout', [LogOutController::class, 'logout'])->name('logout');






















































































