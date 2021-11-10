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

// Fasilitas Kamar
Route::get('room-facilities/{id}/add', [App\Http\Controllers\RoomController::class, 'roomFacilities'])->name('room.facilities');

Route::post('room-detail-add', [App\Http\Controllers\RoomController::class, 'roomFacilitiesStore'])->name('add.facilities');
// END Fasilitas Kamar

// Foto Kamar
Route::get('room-photos/{id}/add', [App\Http\Controllers\RoomController::class, 'roomPhotos'])->name('room.photos');

Route::post('room-photos-add', [App\Http\Controllers\RoomController::class, 'roomPhotosStore'])->name('add.photos');
// END Foto Kamar

// Media
Route::get('media/{id}/show', [App\Http\Controllers\MediaController::class,'show'])->name('media.show');
Route::get('media/{id}/{room}/edit', [App\Http\Controllers\MediaController::class,'edit'])->name('media.edit');
Route::post('media/{id}/delete', [App\Http\Controllers\MediaController::class,'delete'])->name('media.delete');
Route::post('media/{id}/{room}/update', [App\Http\Controllers\MediaController::class,'update'])->name('media.update');
// END Media Edit

// Pemesanan
Route::resource('reservation', App\Http\Controllers\ReservationController::class);
Route::get('/book', [App\Http\Controllers\ReservationController::class, 'book'])->name('reservation.book');
// END Pemesanan

// Transaksi
Route::resource('payment', App\Http\Controllers\PaymentController::class);
// END Transaksi

// Validasi
Route::get('validation', [App\Http\Controllers\ValidationController::class, 'index'])->name('validation');

Route::post('validation/process', [App\Http\Controllers\ValidationController::class, 'validationProccess'])->name('validation.process');

Route::post('validation/cancel', [App\Http\Controllers\ValidationController::class, 'validationCancel'])->name('validation.cancel');
// END Validasi

// Cari Kamar
Route::get('search', [App\Http\Controllers\LandingController::class, 'search'])->name('search');
// END Cari Kamar

// Landing Booking
Route::get('/booking/{id}/{in}/{out}/{price}/{room}/{person}', [App\Http\Controllers\ReservationController::class, 'detailbook'])->name('detail.booking');

Route::get('/pay/edit', [App\Http\Controllers\PaymentController::class, 'payEdit'])->name('pay.edit');

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'pay'])->name('pay');
// END Landing Booking

// Media
Route::resource('media', App\Http\Controllers\MediaController::class);
// END Media