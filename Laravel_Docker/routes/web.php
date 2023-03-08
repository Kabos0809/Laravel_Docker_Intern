<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ResponseController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [ThreadController::class, 'index'])->name('threads');

Route::get('/{thread}', [ThreadController::class, 'detail'])->name('threads.detail');

Route::middleware('auth')->group(function () {
    Route::get('/create', [ThreadController::class, 'create'])->name('threads.create');
    Route::post('/create', [ThreadController::class, 'store']);
    Route::get('/{thread}/update', [ThreadController::class], 'edit')->name('threads.update');
    Route::patch('/{thread}/update', [ThreadController::class], 'update');
    Route::delete('/{thread}/delete', [ThreadController::class], 'destroy')->name('threads.delete');
});

Route::post('/{thread}/response', [ResponseController::class, 'store'])->name('response.store');

Route::middleware('auth')->group(function () {
    Route::get('/{thread}/{response}/update', [ResponseController::class, 'edit'])->name('response.update');
    Route::patch('/{thread}/{response}/update', [ResponseController::class, 'update']);
    Route::delete('/{thread}/{response}/delete', [ResponseController::class, 'destroy'])->name('response.delete');
});