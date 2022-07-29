<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

Route::get('/dashboard', function () {
    return view('/dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/posts', [AdminController::class, 'index'])->name('dashboard.post');
Route::get('/dashboard/post/{post}', [AdminController::class, 'show'])->name('dashboard.post.edit');
Route::put('/dashboard/post/{post}', [AdminController::class, 'update'])->name('dashboard.post.update');

Route::delete('/dashboard/post/{post}', [AdminController::class, 'delete'])->name('dashboard.post.delete');

require __DIR__.'/auth.php';
