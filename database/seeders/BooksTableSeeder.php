<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id');

        foreach (range(1, 10) as $index) {
            DB::table('books')->insert([
                'title' => "Book $index",
                'description' => "Description of Book $index",
                'image_url' => "image_url_$index.jpg",
                'release_year' => 2022 + $index,
                'price' => "$index.99",
                'total_page' => 200 + $index,
                'thickness' => "0.$index cm",
                'category_id' => $categories->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
