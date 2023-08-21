<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvenimentController;
use App\Http\Controllers\TipEvenimentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartamentController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/utilizatori', UserController::class);
    Route::resource('departamente', DepartamentController::class);
    Route::resource('posturi', PostController::class);
    Route::resource('tip_eveniment', TipEvenimentController::class);
    Route::resource('eveniment', EvenimentController::class);
    Route::get('/confirmare-disponibilitate/{eveniment_id}/{disponibil}', [EvenimentController::class, 'confirmareDisponibilitate'])->name('confirmare-disponibilitate');
    Route::post('/confirmare/disponibilitate/{eveniment_id}/{disponibil}', [DashboardController::class,'confirmareDisponibilitate'])
    ->name('confirmare.disponibilitate');


    











});

require __DIR__.'/auth.php';
