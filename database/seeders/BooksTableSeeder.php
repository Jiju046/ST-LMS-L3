<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Delete existing records to start fresh
        Book::query()->delete();

        // Seed some sample data
        \App\Models\Book::factory(1000)->create(); // Adjust the number of books as needed
    }
}
