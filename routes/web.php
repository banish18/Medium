<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{slug}', [App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/tag/{id}', [App\Http\Controllers\HomeController::class, 'tag'])->name('tag');

Auth::routes();


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // User needs to be authenticated to enter here.
   Route::get('/admin', [App\Http\Controllers\admin\AdminController::class, 'index'])->name('dashboard');
   Route::get('/logout', [App\Http\Controllers\admin\AdminController::class, 'logout'])->name('logout');

   Route::get('/posts', [App\Http\Controllers\admin\PostController::class, 'index'])->name('posts');
   Route::get('/create-post', [App\Http\Controllers\admin\PostController::class, 'create'])->name('createPost');
   Route::post('/delete-post', [App\Http\Controllers\admin\PostController::class, 'destroy'])->name('deletePost');
   Route::get('/show-post', [App\Http\Controllers\admin\PostController::class, 'show'])->name('showPost');
   Route::get('/edit-post/{id}', [App\Http\Controllers\admin\PostController::class, 'edit'])->name('editPost');
   Route::post('/save-post', [App\Http\Controllers\admin\PostController::class, 'store'])->name('storePost');
   Route::put('/udpate-post', [App\Http\Controllers\admin\PostController::class, 'update'])->name('updatePost');
   Route::post('/delete-image', [App\Http\Controllers\admin\PostController::class, 'deletImages'])->name('deletImages');

   Route::get('/tags', [App\Http\Controllers\admin\TagController::class, 'index'])->name('tags');
   Route::get('/create-tag', [App\Http\Controllers\admin\TagController::class, 'create'])->name('createTag');
   Route::post('/delete-tag', [App\Http\Controllers\admin\TagController::class, 'destroy'])->name('deleteTag');
   Route::get('/show-tag', [App\Http\Controllers\admin\TagController::class, 'show'])->name('showTag');
   Route::get('/edit-tag/{id}', [App\Http\Controllers\admin\TagController::class, 'edit'])->name('editTag');
   Route::post('/save-tag', [App\Http\Controllers\admin\TagController::class, 'store'])->name('storeTag');
   Route::put('/udpate-tag', [App\Http\Controllers\admin\TagController::class, 'update'])->name('updateTag');
});
