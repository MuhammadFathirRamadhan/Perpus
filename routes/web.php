<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminBooksController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;

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
// user
Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'category']);
Route::resource('/books', BookController::class);
Route::resource('/booking', BookingController::class)->middleware('auth');
Route::get('/books', [BookController::class, 'index']);
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


// admin and librarian
Route::get('/admin', [DashboardController::class, 'index'])->middleware('adminandlibrarian');
Route::resource('/admin/booking', AdminBookingController::class)->middleware('adminandlibrarian');
Route::middleware('adminandlibrarian')->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});

// admin only
Route::resource('/admin/books', AdminBooksController::class)->middleware('admin');

// login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//comment
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
