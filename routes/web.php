<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;

Route::get("/", function () {
    $books = Book::mostpopular()->take(20);
    $mostPopularGenre = Genre::mostPopular();
    $mostPopularAuthor = Author::mostPopular();
    $randomGenre = Genre::randomGenre();
    $randomAuthor = Author::randomAuthor();


    return view('welcome', [
        'title' => 'Home',
        'books' => $books,
        'popularGenre' => $mostPopularGenre,
        'booksInPopularGenre' => Book::findByGenre($mostPopularGenre->id)->take(30),
        'popularAuthor' => $mostPopularAuthor->name,
        'booksByPopularAuthor' =>  Book::findByAuthor($mostPopularAuthor->id)->take(30),
        'randomGenre' => $randomGenre,
        'booksInRandomGenre' => Book::findByGenre($randomGenre->id)->take(30),
        'randomAuthor' => $randomAuthor,
        'booksByRandomAuthor' => Book::findByAuthor($randomAuthor->id)->take(30),
    ]);
})->name('welcome');

// Home Page Route
Route::get('/dashboard', function () {
    $books = Book::paginate(10);
    return view('dashboard', [
        'title' => 'Home',
        'books' => $books,
        'authors' => Author::all(),
        'genres' => Genre::all(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/books/{id}', function ($id) {
    return Book::with('authors', 'genres')->find($id);
});



// Profile Route (with authentication)
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Book, Author, and Genre Resource Routes

Route::resource('books', BookController::class)->middleware(['auth', 'verified']);
Route::resource('authors', AuthorController::class);
Route::resource('genres', GenreController::class);



// Include Auth Routes (for login, registration, etc.)
require __DIR__ . '/auth.php';
