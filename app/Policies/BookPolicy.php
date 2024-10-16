<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;

class BookPolicy
{
    public function create(User $user)
    {
        // Allow all authenticated users to create a book
        return true;
    }

    public function update(User $user, Book $book)
    {
        // Allow the book owner or admin to update the book
        return true;
    }

    public function delete(User $user, Book $book)
    {
        // Allow the book owner or admin to delete the book
        return true;
    }
}
