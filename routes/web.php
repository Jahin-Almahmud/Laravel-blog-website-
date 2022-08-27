<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\LogoController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\author\AuthorController;
use App\Http\Controllers\author\CommentController as AuthorCommentController;
use App\Http\Controllers\author\PostController as AuthorPostController;
use App\Http\Controllers\CommentController as ControllersCommentController;
use App\Http\Controllers\ContactController;
// use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoritepostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController as ControllersPostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscriberController;

use Illuminate\Support\Facades\Auth;
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

Route::middleware(['preventBackHistory'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');
    Route::get('post/blog', [ControllersPostController::class, 'index'])->name('post.index');
    Route::get('post/details/{slug}', [ControllersPostController::class, 'details'])->name('post.details');
    Route::get('category/post/{slug}', [ControllersPostController::class, 'categorywisepost'])->name('post.category');
    Route::get('category/tag/{slug}', [ControllersPostController::class, 'tagwisepost'])->name('post.tag');
    Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');


    Route::get('search', [SearchController::class, 'search'])->name('search');
});

Route::middleware('auth','preventBackHistory')->group(function () {
    Route::get('post/favorite/{id}', [FavoritepostController::class, 'add'])->name('post.favorite');
    Route::post('post/comment/{id}', [ControllersCommentController::class, 'store'])->name('post.comment.store');
});

Auth::routes();

Route::prefix('admin')->as('admin')->namespace('App\Http\Controllers\admin')->middleware('auth','admin','preventBackHistory')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
    Route::post('/change/profile/photo', [AdminController::class, 'changephoto'])->name('change.profle.photo');
    Route::post('/change/password', [AdminController::class, 'changepassword'])->name('change.password');
    Route::get('/subscreiber/index', [AdminSubscriberController::class, 'index'])->name('subscriber');
    Route::delete('/subscreiber/destroy/{id}', [AdminSubscriberController::class, 'destroy'])->name('subscriber.destroy');
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::get('post/comment', [CommentController::class,'comment'])->name('post.comment');
    Route::resource('post', PostController::class);
    Route::delete('post/comment/{id}', [CommentController::class,'delete'])->name('post.comment.delete');
    Route::put('/post/approve/{id}', [PostController::class, 'approve'])->name('post.approve');
    Route::get('/pending/post', [PostController::class, 'pendingpost'])->name('post.pending');
    Route::get('/post/status/{id}', [PostController::class, 'status'])->name('post.status.show');
    Route::get('/post/status/hide/{id}', [PostController::class, 'postHide'])->name('post.status.hide');
    Route::get('user/messages', [AdminContactController::class, 'message'])->name('message');
    Route::Delete('user/message/delete/{id}', [AdminContactController::class, 'delete'])->name('message.delete');
    Route::post('logo/change', [LogoController::class, 'logochange'])->name('logo.change');

});

Route::prefix('author')->as('author')->namespace('App\Http\Controllers\author')->middleware('author','auth','preventBackHistory')->group(function () {
    Route::get('post/comment', [AuthorCommentController::class,'comment'])->name('post.comment');
    Route::delete('post/comment/{id}', [AuthorCommentController::class,'delete'])->name('post.comment.delete');
    Route::get('/dashboard', [AuthorController::class, 'index'])->name('dashboard');
    Route::get('/setting', [AuthorController::class, 'setting'])->name('setting');
    Route::post('/change/profile/photo', [AuthorController::class, 'changephoto'])->name('change.profle.photo');
    Route::get('/change/password', [AuthorController::class, 'changepassword'])->name('change.password');
    Route::resource('post', AuthorPostController::class);
    Route::get('/post/status/{id}', [AuthorPostController::class, 'status'])->name('post.status.show');
    Route::get('/post/status/hide/{id}', [AuthorPostController::class, 'postHide'])->name('post.status.hide');
});


