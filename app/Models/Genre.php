<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
    public static function findByName($genreName)
    {
        return self::where('name', 'like', "%{$genreName}%")->pluck('id')->first();
    }
    public static function mostPopular()
    {
        return Cache::remember('most_popular_genre', 60, function () {
            return static::withCount('books')
                ->orderBy('books_count', 'desc')
                ->first();
        });
    }

    public static function randomGenre()
    {
        $total = self::count(); // Get the total count of books
        $randomId = rand(1, $total); // Generate a random ID
        return self::find($randomId);
    }
}
