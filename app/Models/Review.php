<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Define which attributes can be mass-assigned
    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'title',
        'description'
    ];

    // Define the relationship: A review belongs to a book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Define the relationship: A review belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
