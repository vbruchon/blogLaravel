<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::name('api')->namespace('Api')->group(function () {
    Route::get('/posts', [ApiController::class, 'index'])->name('api.post.index');
    Route::get('/post/{post}', [ApiController::class, 'show'])->name('api.post.show');

    Route::post('/comment', [ApiController::class, 'store'])->name('api.comment.store');
});
