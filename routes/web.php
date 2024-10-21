<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Middleware\CheckRole;


Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Home Page Route
Route::get('/dashboard', function () {
    $books = Book::paginate(10);
    return view('admin.dashboard', [
        'title' => 'Home',
        'books' => $books,
        'authors' => Author::all(),
        'genres' => Genre::all(),
    ]);
})->middleware(CheckRole::class . ':admin')->name('dashboard');

Route::get('/dashboard', function () {
    $books = Book::paginate(10);
    return view('admin.dashboard', [
        'title' => 'Home',
        'books' => $books,
        'authors' => Author::all(),
        'genres' => Genre::all(),
    ]);
})->middleware(CheckRole::class . ':admin')->name('dashboard');

Route::get('/search', [App\Http\Controllers\BookController::class, 'search'])->name('books.search');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.book');
Route::post('/books/{id}', [ReviewController::class, 'store'])
    ->middleware(['auth'])
    ->name('reviews.store');

// Profile Route (with authentication)
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/profile', [App\Http\Controllers\ReviewController::class, 'index'])->name('profile');

// Settings Route (with authentication)
Route::view('settings', 'settings')
    ->middleware(['auth'])
    ->name('settings');

// Book, Author, and Genre Resource Routes
Route::resource('books', BookController::class)->middleware(['auth', 'verified']);
Route::resource('authors', AuthorController::class);
Route::resource('genres', GenreController::class);


// Include Auth Routes (for login, registration, etc.)
require __DIR__ . '/auth.php';
