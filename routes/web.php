<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'Allpost'])->name('home');


// ================= AUTH ROUTES =================
Route::get('user/login', function () {
    return view('admin.login');
})->name('user.login');

Route::post('user/login', [UserController::class, 'loginMatch'])->name('user.loginMatch');

// ================= PROTECTED ROUTES =================
Route::middleware(['validUser'])->group(function () {

    // only admin manually check inside controller
  

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    
    // CATEGORY
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

    // USER

   Route::get('post/show/{id}', [PostController::class, 'show'])->name('post.show');
   Route::get('category/show/{id}', [PostController::class, 'categoryshow'])->name('category.show');
   Route::get('author/show/{id}', [PostController::class, 'authorshow'])->name('author.show');
   Route::get('category/header/{id}', [PostController::class, 'categoryheader'])->name('category.header');
    Route::get('/search', [PostController::class, 'search'])->name('search');
    Route::get('sidebar', [PostController::class, 'sidebar'])->name('sidebar');

    Route::middleware(['validUser'])->group(function () {

    // POSTS
    

    Route::get('post', [PostController::class, 'index'])->name('post.index');
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
});
Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout');