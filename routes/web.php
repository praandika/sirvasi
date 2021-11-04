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

Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing.page');

// Google Login
Route::get('/auth/google', [App\Http\Controllers\OAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [App\Http\Controllers\OAuthController::class, 'googleCallback'])->name('google.callback');
// END Google Login

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Data User
Route::prefix('admin')->group(function(){
    /**Read */
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('admin.data');
    /**Create */
    Route::post('store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.store');
    /**Edit */
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.edit');
    /**Update */
    Route::post('update', [App\Http\Controllers\UserController::class, 'update'])->name('admin.update');

    /**Change Password Admin */
    Route::post('adminpass', [App\Http\Controllers\UserController::class, 'adminpass'])->name('admin.password');
});
// END Data User

// Data Tamu
Route::get('guest', [App\Http\Controllers\UserController::class, 'guest'])->name('guest.data');
// END Data Tamu

// Data Kamar
Route::resource('room', App\Http\Controllers\RoomController::class);
// END Data Kamar

// Data Fasilitas
Route::resource('facilities', App\Http\Controllers\FacilityController::class);
// END Data Fasilitas
