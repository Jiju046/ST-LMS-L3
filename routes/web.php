<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBookController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // booking
    Route::get('booking', [UserBookController::class, 'booking'])->name('booking.index');
    Route::post('booking', [UserBookController::class, 'store'])->name('booking.store');
    Route::post('/get-available-books', [UserBookController::class, 'getAvailableBooks']);

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Routes accessible by users with the 'Admin' role
    //book
    Route::resource('books', BookController::class);
    Route::resource('images', ImageController::class);
    
    //booking_details
    Route::get('booking-details', [UserBookController::class, 'bookingDetails'])->name('booking-details.index');
    Route::post('booking-details/status', [UserBookController::class, 'bookingStatus'])->name('booking-details.status');

});

require __DIR__.'/auth.php';
