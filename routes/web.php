<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\menuControler;
use App\Http\Controllers\chefController;
use App\Http\Controllers\reservasiController;
use App\Http\Controllers\user;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\userAdmin;
use App\Http\Controllers\homeAdmin;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login1', function () {
    return view('login');
});

Auth::routes();

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/dashboard', [homeAdmin::class, 'index'])->name('admin.dashboard');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::resource('menu', menuControler::class);
Route::resource('chef', chefController::class);
Route::resource('reservasi', reservasiController::class);
Route::resource('user', user::class);

Route::resource('userAdmin', userAdmin::class);
