<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'idea/', 'as' => 'idea.'], function () {

    Route::post('/', [IdeaController::class, 'store'])->name('create');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    Route::group(
        [
            'middleware' => ['auth']
        ],
        function () {
            Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
            Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
            Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
            Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
        }
    );
});
Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
});




