<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        // Fetch all books with authors and genres
        $books = Book::with(['authors', 'genres'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        // Fetch authors and genres for the form
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.create', compact('authors', 'genres'));
    }

    public function store(BookRequest  $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'authors' => 'required|array', // Expecting an array of author IDs
            'genres' => 'required|array',  // Expecting an array of genre IDs
        ]);

        // Create the book
        $book = Book::create($request->only(['title', 'description', 'published_date', 'rating', 'language', 'pages', 'price', 'cover_image']));

        // Attach authors and genres
        $book->authors()->attach($request->authors);
        $book->genres()->attach($request->genres);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        // Fetch authors and genres for the form
        $authors = Author::all();
        $genres = Genre::all();

        return view('books.edit', compact('book', 'authors', 'genres'));
    }

    public function update(Request $request, Book $book)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'authors' => 'required|array', // Expecting an array of author IDs
            'genres' => 'required|array',  // Expecting an array of genre IDs
        ]);

        // Update the book
        $book->update($request->only(['title', 'description', 'published_date', 'rating', 'language', 'pages', 'price', 'cover_image']));

        // Sync authors and genres
        $book->authors()->sync($request->authors);
        $book->genres()->sync($request->genres);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
