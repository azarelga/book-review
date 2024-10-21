<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public static function findByName($authorName)
    {
        return self::where('name', 'like', "%{$authorName}%")->pluck('id')->first();
    }

    public static function mostPopular()
    {
        return Cache::remember('most_popular_author', 60, function () {
            return static::withCount('books')
                ->orderBy('books_count', 'desc')
                ->first();
        });
    }

    public static function randomAuthor()
    {
        $total = self::count(); // Get the total count of books
        $randomId = rand(1, $total); // Generate a random ID
        return self::find($randomId);
    }
}
