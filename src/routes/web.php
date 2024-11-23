<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FortifyRegisterController;
use App\Http\Controllers\FortifyLoginController;
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);



Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
});

Route::get('/admin/search', [AuthController::class, 'search']);
