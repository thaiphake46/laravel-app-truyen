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

    Route::get('/story', [AuthorController::class, 'listStoryPage'])
        ->name('listStoryPage');

    Route::get('/story/create', [AuthorController::class, 'createStoryPage'])
        ->name('createStoryPage');

    Route::post('/story/store', [AuthorController::class, 'storeStory'])
        ->name('storeStory');

    Route::get('/story/edit/{id}', [AuthorController::class, 'editStoryPage'])
        ->name('editStoryPage')
        ->where('id', '[0-9]+');

    Route::patch('/story/update/{id}', [AuthorController::class, 'updateStory'])
        ->name('updateStory')
        ->where('id', '[0-9]+');

    Route::delete('/story/delete/{id}', [AuthorController::class, 'deleteStory'])
        ->name('deleteStory')
        ->where('id', '[0-9]+');


    Route::get('/story/{slug}/chapter',  [AuthorController::class, 'listChapterPage'])
        ->name('listChapterPage')
        ->where([
            'slug' => '[0-9A-Za-z_]+',
        ]);

    Route::get('/story/{slug}/chapter/create', [AuthorController::class, 'createChapterPage'])
        ->name('createChapterPage')
        ->where([
            'slug' => '[0-9A-Za-z_]+',
        ]);

    Route::post('/story/{slug}/chapter/store', [AuthorController::class, 'storeChapter'])
        ->name('storeChapter')
        ->where([
            'slug' => '[0-9A-Za-z_]+',
        ]);
});
