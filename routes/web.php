<?php

use App\Http\Controllers\HomeController;
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

Route::view('/', 'welcome');

// Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::view('instansi', 'livewire.instansi.instansi')
    ->middleware(['auth', 'verified'])
    ->name('instansi');

    Route::view('user', 'livewire.user.user')
        ->middleware(['auth', 'verified'])
        ->name('user');

    Route::view('post', 'livewire.post.post')
    ->middleware(['auth', 'verified'])
    ->name('post');

Route::view('donasi', 'livewire.donasi.donasi')
    ->middleware(['auth', 'verified'])
    ->name('donasi');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
