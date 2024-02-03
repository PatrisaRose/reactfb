<?php

use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->string('author', 32);
            $table->longText('title', 150);
            $table->integer('pieces')->default(50);
            $table->timestamps();
        });

        /* Book::create([
            'author' => 'Dezsőke',
            'title' => 'Babszem',
            'pieces' => 1,
        ]);

        Book::create([
            'author' => 'Béla',
            'title' => 'Babszemek',
            'pieces' => 546,
        ]);

        Book::create([
            'author' => 'Józsi',
            'title' => 'Babszemekre',
            'pieces' => 65,
        ]);*/
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
