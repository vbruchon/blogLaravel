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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home Page -> list all posts
Route::get('/', [HomeController::class, 'index'])->name('home');

//Post Page -> Show an article
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

//Post Page -> Add an comment to this post
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

//Dashboard Home Page -> list all actions to the admin can release
Route::get('/dashboard', function () {
    return view('/dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

//Dashboard Posts Page -> list all posts
Route::get('/dashboard/posts', [AdminController::class, 'index'])->name('dashboard.post');
//Dashboard Posts Page -> Show an post for edit this
Route::get('/dashboard/post/{post}', [AdminController::class, 'show'])->name('dashboard.post.edit');
//Dashboard Posts Page -> Send update to the DB and show the post update
Route::put('/dashboard/post/{post}', [AdminController::class, 'update'])->name('dashboard.post.update');

//Dashboard Posts Page -> Delete an post and this comments
Route::delete('dashboard/post/{post}/delete', [AdminController::class, 'destroy'])->name('dashboard.posts.destroy');

//Route::delete('/dashboard/post/{post}', [AdminController::class, 'destroy'])->name('dashboard.post.delete');

require __DIR__.'/auth.php';
