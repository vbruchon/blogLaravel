<?php

use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminPostController;
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
Route::get('/dashboard/posts', [AdminPostController::class, 'index'])->name('dashboard.post');

//Dashboard Create an post
Route::get('/dashboard/post/create', [AdminPostController::class, 'create'])->name('dashboard.create');

//Dashboard Add an post
Route::post('dashboard/post/create/add', [AdminPostController::class, 'addPost'])->name('dashboard.add');

//Dashboard Posts Page -> Show an post for edit this
Route::get('/dashboard/post/{post}', [AdminPostController::class, 'show'])->name('dashboard.post.edit');

//Dashboard Posts Page -> Send update to the DB and show the post update
Route::put('/dashboard/post/{post}', [AdminPostController::class, 'update'])->name('dashboard.post.update');

//Dashboard Posts Page -> Delete an post and this comments
Route::delete('dashboard/post/{post}/delete', [AdminPostController::class, 'destroy'])->name('dashboard.posts.destroy');




//Dashboard Comments Page By Post -> list all comments
Route::get('/dashboard/post/{post}/comments', [AdminCommentController::class, 'show'])->name('dashboard.post.comments');
/*
//Dashboard Comments Page By Post -> Send update to the DB and show the post update
Route::put('/dashboard/post/{post}', [AdminCommentController::class, 'update'])->name('dashboard.comment.update');
*/
//Dashboard Comment Page By Post -> Delete an comment
Route::delete('dashboard/post/{post}/comments/{comment}/delete', [AdminCommentController::class, 'destroy'])->name('dashboard.comment.destroy');

require __DIR__.'/auth.php';
