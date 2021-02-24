<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Auth;
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
// Auth::routes();
Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::post('home', [ExcelController::class, 'index'])->name('excel');
    Route::get('log', [HomeController::class, 'logs'])->name('log');
    Route::get('mail/{mail}', [ExcelController::class, 'mail'])->name('mail');
    Route::get('resend/{mail}', [ExcelController::class, 'resend'])->name('resend');
});

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
