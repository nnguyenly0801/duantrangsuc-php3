<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('products')->insert([
                'name' => fake()->text(100),
                'price' => fake()->numberBetween(1000, 5000),
                'image' => fake()->imageUrl(),
                'description' => fake()->text(255),
                'quantity' => fake()->numberBetween(1, 100),
                'category_id' => rand(1, 4),
            ]);
        }
    }
}
