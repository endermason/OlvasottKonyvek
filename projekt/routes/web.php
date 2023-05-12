<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReadsController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', WelcomeController::class);

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::get('/read-books', [ReadsController::class, 'index'])->name('reads');

Route::get('/book/create', [ReadsController::class, 'createStart']);
Route::post('/book', [ReadsController::class, 'storeNew']);

//HTMX views
Route::post('/book/search', [ReadsController::class, 'createSearch']);
Route::post('/book/create-new', [ReadsController::class, 'createNew']);
Route::post('/book/create-use', [ReadsController::class, 'create']);

require __DIR__.'/auth.php';
