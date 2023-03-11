<?php

use App\Http\Controllers\User\ProfileController;
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
    return view('user.user-dashboard');
})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::middleware('auth:users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::get('/', [ThreadController::class, 'index'])->name('threads');

Route::middleware('auth:users')->group(function () {
    Route::get('/create', [ThreadController::class, 'create'])->name('threads.create');
    Route::post('/create', [ThreadController::class, 'user_store']);
});

Route::get('/{thread}', [ThreadController::class, 'detail'])->name('threads.detail');

Route::middleware('auth:users')->group(function () {
    Route::get('/{thread}/update', [ThreadController::class, 'user_edit'])->name('threads.update');
    Route::patch('/{thread}/update', [ThreadController::class, 'user_update']);
    Route::delete('/{thread}/delete', [ThreadController::class, 'user_destroy'])->name('threads.delete');
});

Route::post('/{thread}/response', [ResponseController::class, 'user_store'])->name('response.store');

Route::middleware('auth:users')->group(function () {
    Route::get('/{thread}/{response}/update', [ResponseController::class, 'user_edit'])->name('response.update');
    Route::patch('/{thread}/{response}/update', [ResponseController::class, 'user_update']);
    Route::delete('/{thread}/{response}/delete', [ResponseController::class, 'user_destroy'])->name('response.delete');
});