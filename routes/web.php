<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
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

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/events/{id}', [EventController::class, 'view'])->name('event.view');
    Route::get('/players/{id}', [PlayerController::class, 'view'])->name('player.view');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('password.protected')->group(function () {
    Route::get('/ratings/{eventId}', [RatingController::class, 'view'])->name('ratings.event');
});

Route::get('/password', function () {
    return view('password');
});

Route::get('/nachmeldung/{event_id}', [PlayerController::class, 'add'])->name('nachmeldung');
Route::post('/nachmeldung/{event_id}', [PlayerController::class, 'store'])->name('nachmeldung.store');

require __DIR__.'/auth.php';
