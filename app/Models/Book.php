<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'publisher',
        'published_date',
        'rating',
        'language',
        'pages',
        'price',
        'cover_image'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public static function mostPopular()
    {
        $total = self::count(); // Get the total count of books
        $randomIds = [];

        // Ensure we don't try to fetch more than available
        $limit = min(10, $total);

        while (count($randomIds) < $limit) {
            $randomId = rand(1, $total); // Generate a random ID
            if (!in_array($randomId, $randomIds)) {
                $randomIds[] = $randomId; // Add to the array if not already present
            }
        }

        return self::whereIn('id', $randomIds)->get(); // Fetch the books by random IDs
    }

    public static function findByAuthor($authorId)
    {
        return self::whereHas('authors', function ($query) use ($authorId) {
            $query->where('authors.id', $authorId);
        });
    }

    public static function findByGenre($genreId)
    {
        return self::whereHas('genres', function ($query) use ($genreId) {
            $query->where('genres.id', $genreId);
        });
    }
}
