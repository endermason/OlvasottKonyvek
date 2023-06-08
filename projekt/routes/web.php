<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrowsingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReadsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::get('/contact', ContactController::class)->name('contact');
Route::post('/contact-send', [ContactController::class, 'send'])->name('contact-send');

Route::get('/read-books', [ReadsController::class, 'index'])->name('reads');

Route::get('/book/create', [ReadsController::class, 'createStart']);
Route::post('/book', [ReadsController::class, 'storeNew']);
Route::post('/book2', [ReadsController::class, 'store']);

Route::get('/review/create/{id}', [ReviewController::class, 'createReview']);
Route::get('/review/{id}', [ReviewController::class, 'editReview']);

Route::get('/browsing', [BrowsingController::class, 'index'])->name('browsing');

Route::get('/admin', AdminController::class)->name('admin');

//HTMX views
Route::post('/book/search', [ReadsController::class, 'createSearch']);
Route::post('/book/create-new', [ReadsController::class, 'createNew']);
Route::post('/book/create-use', [ReadsController::class, 'create']);
Route::delete('/book/delete', [ReadsController::class, 'delete']);
Route::post('/review', [ReviewController::class, 'store']);
Route::post('/review/edit', [ReviewController::class, 'edit']);
Route::delete('/review/delete', [ReviewController::class, 'delete']);
Route::get('/browsing/load/{page}', [BrowsingController::class, 'load'])->name('browsing.load');
Route::delete('/browsing/delete', [BrowsingController::class, 'delete']);


//Verify email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
})->middleware(['auth', 'signed'])->name('verification.verify');

require __DIR__.'/auth.php';
