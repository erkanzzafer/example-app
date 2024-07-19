<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
Route::get('/terms', function () {
    return view('terms');
});

Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');
Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');
Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');
Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');
Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::post('/idea/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store');