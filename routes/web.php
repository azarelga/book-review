<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;

// Home Page Route
Route::get('/dashboard', function () {
    // Fetch the most popular books, genre, and author
    $books = Book::mostpopular()->take(20);
    $mostPopularGenre = Genre::mostPopular();


    $mostPopularAuthor = Author::mostPopular();

    return view('dashboard', [
        'title' => 'Home',
        'books' => $books,
        'popularGenre' => $mostPopularGenre,
        'booksInPopularGenre' => Book::findByGenre($mostPopularGenre->id)->take(30),
        'popularAuthor' => $mostPopularAuthor->name,
        'booksByPopularAuthor' =>  Book::findByAuthor($mostPopularAuthor->id)->take(30)
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


// Profile Route (with authentication)
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Book, Author, and Genre Resource Routes

Route::get('books', [BookController::class, 'index'])->middleware(['auth', 'verified'])->name('books.index');
Route::get('books/create', [BookController::class, 'create'])->middleware(['auth', 'verified'])->name('books.create');
Route::post('books', [BookController::class, 'store'])->middleware(['auth', 'verified'])->name('books.store');
Route::get('books/{book}', [BookController::class, 'show'])->middleware(['auth', 'verified'])->name('books.show');
Route::get('books/{book}/edit', [BookController::class, 'edit'])->middleware(['auth', 'verified'])->name('books.edit');
Route::put('books/{book}', [BookController::class, 'update'])->middleware(['auth', 'verified'])->name('books.update');
Route::delete('books/{book}', [BookController::class, 'destroy'])->middleware(['auth', 'verified'])->name('books.destroy');
Route::resource('authors', AuthorController::class);
Route::resource('genres', GenreController::class);



// Include Auth Routes (for login, registration, etc.)
require __DIR__ . '/auth.php';
