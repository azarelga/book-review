<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::mostPopular()->take(10);
        $mostPopularGenre = Genre::mostPopular();
        $mostPopularAuthor = Author::mostPopular();
        $randomGenre = Genre::randomGenre();
        $randomAuthor = Author::randomAuthor();

        $datas = [
            [$books, "Most Popular Books"],
            [Book::findByGenre($mostPopularGenre->id)->get()->take(10), "Most Popular Genre: " . Str::remove("'", $mostPopularGenre->name)],
            [Book::findByAuthor($mostPopularAuthor->id)->get()->take(10), "Most Popular Author: " . $mostPopularAuthor->name],
            [Book::findByGenre($randomGenre->id)->get()->take(10), "Genre: " . Str::remove("'", $randomGenre->name)],
            [Book::findByAuthor($randomAuthor->id)->get()->take(10), "Author: " . $randomAuthor->name],
        ];

        return view('welcome', compact('datas'));
    }
}
