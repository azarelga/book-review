<?php

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // batasi hanya 20 data saja
    $books = Book::mostpopular()->take(20);
    $mostPopularGenre = Genre::mostPopular();
    

    $mostPopularAuthor = Author::mostPopular();

    return view('welcome', ['title' => 'Home',
    'books' => $books, 
    'popularGenre'=> $mostPopularGenre, 
    'booksInPopularGenre' => Book::findByGenre($mostPopularGenre->id)->take(30), 
    'popularAuthor' => $mostPopularAuthor->name, 
    'booksByPopularAuthor' =>  Book::findByAuthor($mostPopularAuthor->id)->take(30)
    ]);
});
