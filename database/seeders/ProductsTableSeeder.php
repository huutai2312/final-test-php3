<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'title' => 'Product ' . $i,
                'description' => 'Description for product ' . $i,
                'detail' => 'Detail for product ' . $i,
                'price' => rand(1000, 10000),
                'image' => 'image' . $i . '.jpg',
                'category_id' => $categories->random(),
                'views' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
