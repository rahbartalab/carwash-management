<?php

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

//dd(\App\Models\Invoice::find(2)->user);

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('invoices', \App\Http\Controllers\InvoiceController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::get('track-order', [\App\Http\Controllers\OrderTrackingController::class, 'index']);
Route::post('track-order', [\App\Http\Controllers\OrderTrackingController::class, 'attempt']);

Route::get('requests/{user_id?}', [\App\Http\Controllers\InvoiceController::class, 'index']);
