<?php

use App\Http\Controllers\PaketController;
use App\Http\Controllers\MaskapaiController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create')->middleware('auth');
    Route::post('/paket', [PaketController::class, 'store'])->name('paket.store')->middleware('auth');

    Route::get('/maskapai', [MaskapaiController::class, 'index'])->name('maskapai.index');
    Route::get('/maskapai/create', [MaskapaiController::class, 'create'])->name('maskapai.create')->middleware('auth');
    Route::post('/maskapai', [MaskapaiController::class, 'store'])->name('maskapai.store')->middleware('auth');

    Route::get('/book', [BookController::class, 'index'])->name('book.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create')->middleware('auth');
    Route::post('/book', [BookController::class, 'store'])->name('book.store')->middleware('auth');
    Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit')->middleware('auth');
    Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update')->middleware('auth');

});



require __DIR__.'/auth.php';
