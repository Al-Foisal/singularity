<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OutletController;
use App\Http\Controllers\Backend\UserController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'storeLogin']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::controller(UserController::class)->prefix('/users')->as('user.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{user}', 'edit')->name('edit');
    Route::put('/update/{user}', 'update')->name('update');
    Route::delete('/delete/{user}', 'delete')->name('delete');
});

Route::resource('outlets', OutletController::class)->except('show');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');