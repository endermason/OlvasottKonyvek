<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReadsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', WelcomeController::class);

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::get('/read-books', [ReadsController::class, 'index'])->name('reads');

require __DIR__.'/auth.php';
