<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ImportBooks extends Command
{
    protected $signature = 'import:books {file}';
    protected $description = 'Import books from a CSV file';

    public function handle(){
        $file = $this->argument('file');
        $data = array_map('str_getcsv', file($file));
        $headers = array_shift($data);

        foreach ($data as $index => $row) {
            // Skip empty rows or those with mismatched columns
            if (count($row) === 0 || count($row) !== count($headers)) {
                $this->error("Skipping row {$index} due to mismatched column count.");
                $this->info("Row {$index} data: " . json_encode($row));
                continue;
            }

            $row = array_combine($headers, $row);

            // Handle authors (split by commas)
            $authorNames = explode(',', $row['author']);
            $authors = [];
            foreach ($authorNames as $name) {
                $name = trim($name);
                $authors[] = Author::firstOrCreate(['name' => $name]);
            }

            // Handle genres, supporting semicolon-separated strings inside brackets
            $genreNames = trim($row['genres'], "[]"); // Remove brackets
            $genreNames = explode(';', $genreNames);  // Split by semicolon
            $genres = [];
            foreach ($genreNames as $genreName) {
                $genres[] = Genre::firstOrCreate(['name' => trim($genreName)]);
            }

            // Parse the publish date to Y-m-d format using Carbon
            $publishDate = null;
            if (!empty($row['publishDate'])) {
                try {
                    $publishDate = Carbon::parse($row['publishDate'])->format('Y-m-d');
                } catch (\Exception $e) {
                    $this->error("Invalid date format for row {$index}: " . $row['publishDate']);
                }
            }

            // Create the book
            $book = Book::create([
                'title' => $row['title'],
                'description' => $row['description'] ?? '',
                'publisher' => $row['publisher'] ?? '',
                'published_date' => $publishDate,
                'rating' => $row['rating'] ?? null,
                'language' => $row['language'] ?? '',
                'pages' => (int) $row['pages'],
                'price' => (float) $row['price'],
                'cover_image' => $row['coverImg'] ?? '',
            ]);

            // Attach authors and genres
            $book->authors()->sync(collect($authors)->pluck('id'));
            $book->genres()->sync(collect($genres)->pluck('id'));

            $this->info('Imported: ' . $row['title']);
        }

        $this->info('Import completed successfully!');
    }
}
