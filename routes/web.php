<?php

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

Auth::routes();


Route::get('/', [App\Http\Controllers\StudentRegistrationController::class, 'index'])->name('register');
Route::get('/login', [App\Http\Controllers\StudentLoginController::class, 'index'])->name('login');

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/home', [App\Http\Controllers\StudentProfileController::class, 'index'])->name('home');
    }
);
