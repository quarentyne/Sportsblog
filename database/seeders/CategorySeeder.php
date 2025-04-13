<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->createMany([
            ['slug' => 'nba', 'name' => 'NBA'],
            ['slug' => 'nfl', 'name' => 'NFL'],
            ['slug' => 'nhl', 'name' => 'NHL'],
            ['slug' => 'mlb', 'name' => 'MLB'],
            ['slug' => 'soccer', 'name' => 'Soccer'],
            ['slug' => 'formula-d', 'name' => 'Formula D'],
            ['slug' => 'nascar', 'name' => 'Nascar'],
        ]);
    }
}
