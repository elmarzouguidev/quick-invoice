<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Invoice\InvoiceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'sells'], function () {
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/', InvoiceController::class)->name('invoices');
    });
});
