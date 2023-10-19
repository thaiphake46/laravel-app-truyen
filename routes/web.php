<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/user')->group(function () {
    Auth::routes();
    Route::get('/authorVerify', [AccountController::class, 'verifyAuthorPage'])->name('verifyAuthorPage');
    Route::get('/profile', [AccountController::class, 'index'])->name('profile');
});

Route::prefix('/author')->group(function () {
    Route::get('/', [AuthorController::class, 'index']);
    Route::get('/story', [AuthorController::class, 'listStoryPage'])->name('listStoryPage');
    Route::get('/story/create', [AuthorController::class, 'createStoryPage'])->name('createStoryPage');
});
