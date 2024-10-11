<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // batasi hanya 20 data saja
    $books = Book::latest()->take(20)->get();
    return view('welcome', ['title' => 'Home','books' => $books]);
});
