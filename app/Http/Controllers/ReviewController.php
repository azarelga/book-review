<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review as AppReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // index method to display reviews from autheticated user
    public function index()
    {
        $reviews = AppReview::where('user_id', Auth::id())->get();
        return view('profile', compact('reviews'));
    }
    public function store(Request $request, String $bookId)
    {
        // Validate the review input
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create the review
        AppReview::create([
            'user_id' => Auth::id(), // Get the authenticated user ID
            'book_id' => $bookId,
            'rating' => $validated['rating'],
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        // Update the average rating of the book after review is added
        $this->updateBookRating($bookId);

        // Redirect back to the book detail page with success message
        return redirect()->intended(route('books.book', ['id' => $bookId]))->with('success', 'Review submitted successfully!');
    }
    protected function updateBookRating(String $bookId)
    {
        // Get all reviews for the book
        $book = Book::find($bookId);
        $averageRating = $book->reviews()->avg('rating'); // Calculate average rating

        // Update book's average rating (assuming there is a column in the 'books' table for this)
        $book->update(['rating' => $averageRating]);
    }
}
