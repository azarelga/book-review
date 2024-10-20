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
        return self::orderBy('rating', 'desc')->get();
    }

    public static function findByAuthor($authorId)
    {
        return self::whereHas('authors', function ($query) use ($authorId) {
            $query->where('authors.id', $authorId);
        })->get();
    }

    public static function findByGenre($genreId){
        return self::whereHas('genres', function($query) use ($genreId){
            $query->where('genres.id', $genreId);
        })->get();
    }
}
