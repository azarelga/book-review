<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with(['authors', 'genres'])->mostPopular()->take(20)->get();
        // $mostPopularGenre = Genre::mostPopular();
        // $mostPopularAuthor = Author::mostPopular();
        // $randomGenre = Genre::randomGenre();
        // $randomAuthor = Author::randomAuthor();

        return view('welcome', [
            'title' => 'Home',
            'books' => $books,
            // 'popularGenre' => $mostPopularGenre,
            // 'booksInPopularGenre' => Book::findByGenre($mostPopularGenre->id)->take(30),
            // 'popularAuthor' => $mostPopularAuthor->name,
            // 'booksByPopularAuthor' => Book::findByAuthor($mostPopularAuthor->id)->take(30),
            // 'randomGenre' => $randomGenre,
            // 'booksInRandomGenre' => Book::findByGenre($randomGenre->id)->take(30),
            // 'randomAuthor' => $randomAuthor,
            // 'booksByRandomAuthor' => Book::findByAuthor($randomAuthor->id)->take(30),
        ]);
    }
}
