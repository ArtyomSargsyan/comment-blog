<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;


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





Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/all-blogs/{id}', [BlogController::class, 'allUserBlogs'])->name('all.blogs');
    Route::get('/blog-edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('blog-store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('create-blog', [BlogController::class, 'create'])->name('create.blog');
    Route::post('comment-update', [CommentController::class, 'update'])->name('comment.update');
    Route::post('comment-replay', [CommentController::class, 'replayComment'])->name('comment.replay');
    Route::get('/comment-delete/{id}', [CommentController::class, 'destroy']);
});

Route::group(['middleware' => ['auth', 'admin', ]], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('admin');
        Route::get('/blog-delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
        Route::post('blog-update', [BlogController::class, 'update'])->name('blog.update');
        Route::post('/comment-store', [CommentController::class, 'store'])->name('comment.store');

    });
});

Route::get('/admin/comment-edit/{id}', [CommentController::class, 'index'])->name('admin.comment.edit');

Route::get('/', [BlogController::class, 'index'])->name('blogs');

Route::get('show-comment/{id}', [CommentController::class, 'show'])->name('show.comment');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
