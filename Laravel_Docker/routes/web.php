<?php

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

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::get('/', [ThreadController::class, 'index'])->name('threads');

Route::get('/{thread}', [ThreadController::class, 'detail'])->name('threads.detail');