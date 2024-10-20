<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User who made the review
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // The book being reviewed
            $table->integer('rating');  // Rating (e.g., 1-5 stars)
            $table->text('title');  // Review content
            $table->text('description');  // Review content
            $table->timestamps();  // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
