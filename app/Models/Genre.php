<?php

namespace App\Models;

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
    public static function mostPopular()
    {
        return static::withCount('books')
            ->orderBy('books_count', 'desc')
            ->select('id', 'name')
            ->first();
    }

    public static function randomGenre()
    {
        return static::inRandomOrder()->first();
    }
}
