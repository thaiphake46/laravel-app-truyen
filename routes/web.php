<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;
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


Route::prefix('/story')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'storyViewPage'])
        ->name('storyViewPage')
        ->where([
            'slug' => '[0-9A-Za-z_]+',
        ]);
    Route::get('/{slug_story}/chapter/{slug_chapter}', [HomeController::class, 'chapterViewPage'])
        ->name('chapterViewPage')
        ->where([
            'slug_story' => '[0-9A-Za-z_]+',
            'slug_chapter' => '[0-9A-Za-z_]+',
        ]);
});

Route::prefix('/user')->group(function () {
    Auth::routes();
    // Route::get('/authorVerify', [AccountController::class, 'verifyAuthorPage'])->name('verifyAuthorPage');
    Route::get('/profile', [AccountController::class, 'index'])->name('profile');
});

Route::prefix('/author')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('author');
    Route::get('/verify', [AuthorController::class, 'verifyAuthorPage'])->name('verifyAuthorPage');
    Route::post('/verify', [AuthorController::class, 'verifyAuthor'])->name('verifyAuthor');

    Route::get('/story', [StoryController::class, 'listStoryPage'])
        ->name('listStoryPage');

    Route::get('/story/create', [StoryController::class, 'createStoryPage'])
        ->name('createStoryPage');

    Route::post('/story/store', [StoryController::class, 'storeStory'])
        ->name('storeStory');

    Route::get('/story/edit/{id}', [StoryController::class, 'editStoryPage'])
        ->name('editStoryPage')
        ->where('id', '[0-9]+');

    Route::patch('/story/update/{id}', [StoryController::class, 'updateStory'])
        ->name('updateStory')
        ->where('id', '[0-9]+');

    Route::delete('/story/delete/{id}', [StoryController::class, 'deleteStory'])
        ->name('deleteStory')
        ->where('id', '[0-9]+');


    Route::get('/story/{slug}/chapter',  [ChapterController::class, 'listChapterPage'])
        ->name('listChapterPage')
        ->where([
            'slug' => '[0-9A-Za-z_]+',
        ]);

    Route::get('/story/{slug}/chapter/create', [ChapterController::class, 'createChapterPage'])
        ->name('createChapterPage')
        ->where([
            'slug' => '[0-9A-Za-z_]+',
        ]);

    Route::post('/story/{slug}/chapter/store', [ChapterController::class, 'storeChapter'])
        ->name('storeChapter')
        ->where([
            'slug' => '[0-9A-Za-z_]+',
        ]);

    Route::get('/story/{slug_story}/chapter/{slug_chapter}', [ChapterController::class, 'editChapterPage'])
        ->name('editChapterPage')
        ->where([
            'slug_story' => '[0-9A-Za-z_]+',
            'slug_chapter' => '[0-9A-Za-z_]+',
        ]);

    Route::patch('/story/{slug_story}/chapter/{slug_chapter}', [ChapterController::class, 'updateChapter'])
        ->name('updateChapter')
        ->where([
            'slug_story' => '[0-9A-Za-z_]+',
            'slug_chapter' => '[0-9A-Za-z_]+',
        ]);

    Route::delete('/story/{slug_story}/chapter/{slug_chapter}', [ChapterController::class, 'deleteChapter'])
        ->name('deleteChapter')
        ->where([
            'slug_story' => '[0-9A-Za-z_]+',
            'slug_chapter' => '[0-9A-Za-z_]+',
        ]);
});
