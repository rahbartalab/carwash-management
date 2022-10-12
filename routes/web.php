<?php

use App\Http\Controllers\InvoiceController;
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

Route::view('/', 'home');
Route::resource('invoices', InvoiceController::class);
Route::get('/track-order', [\App\Http\Controllers\OrderTrackingController::class, 'index']);
Route::post('/track-order', [\App\Http\Controllers\OrderTrackingController::class, 'attempt']);
