<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Author;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
    {
        // disable foreignkey checker
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // delete old data
        $this->command->info('Truncating tables...');
        Author::truncate();
        Category::truncate();
        Book::truncate();
        DB::table('book_category')->truncate(); // Truncate pivot table
        Rating::truncate();
        $this->command->info('Tables truncated.');

        $now = Carbon::now();

        // generate Author and Category data with factory
        $this->command->info('Creating 1,000 authors...');
        Author::factory(1000)->create();
        $this->command->info('Creating 3,000 categories...');
        Category::factory(3000)->create();

        // get id of author and category
        $authorIds = Author::pluck('id');
        $categoryIds = Category::pluck('id');
        // bulk insert start
        $this->command->info('Preparing 100,000 books for bulk insert...');
        $booksToInsert = []; // initialize empty array
        for ($i = 0; $i < 100000; $i++) {
            $booksToInsert[] = [
                'author_id' => $authorIds->random(),
                'title' => fake()->sentence(),
                'description' => fake()->paragraph(),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        // start inserting data
        foreach (array_chunk($booksToInsert, 5000) as $chunk) {
            DB::table('books')->insert($chunk);
        }
        $this->command->info('100,000 books inserted.');

        // get id of book
        $bookIds = Book::pluck('id');
        $this->command->info('Preparing book-category relations for bulk insert...');
        $pivotToInsert = [];
        foreach ($bookIds as $bookId) {
            $randCategories = $categoryIds->random(rand(1, 3));
            foreach ($randCategories as $categoryId) {
                $pivotToInsert[] = [
                    'book_id' => $bookId,
                    'category_id' => $categoryId,
                ];
            }
        }
        foreach (array_chunk($pivotToInsert, 10000) as $chunk) {
            DB::table('book_category')->insert($chunk); // insert to pivot table
        }
        $this->command->info('Book-category relations inserted.');

        $this->command->info('Preparing 500,000 ratings for bulk insert...');
        $ratingsToInsert = [];
        for ($i = 0; $i < 500000; $i++) {
            $ratingsToInsert[] = [
                'book_id' => $bookIds->random(),
                'rating' => rand(1, 10),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        foreach (array_chunk($ratingsToInsert, 10000) as $chunk) {
            DB::table('ratings')->insert($chunk);
        }
        $this->command->info('500,000 ratings inserted.');

        // enable foreign key checker again
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
