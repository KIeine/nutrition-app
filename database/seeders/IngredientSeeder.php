<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'name' => Str::random(10),
            'calories' => rand(1, 100),
            'protein' => rand(1, 100),
            'carbohydrates' => rand(1, 100),
            'fat' => rand(1, 100),
            'sugar' => rand(1, 100),
            'fiber' => rand(1, 100),
            'image' => '/ingredients/avocado.jpg',
            'serving_grams' => rand(1, 100),
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Banana',
            'calories' => 105,
            'protein' => 1.3,
            'carbohydrates' => 28,
            'fat' => 0.4,
            'sugar' => 14,
            'fiber' => 3,
            'image' => '/ingredients/banana.jpg',
            'serving_name' => 'fruit',
            'serving_grams' => 118,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Oat flour',
            'calories' => 420,
            'protein' => 15.3,
            'carbohydrates' => 68.3,
            'fat' => 9.5,
            'sugar' => 0.83,
            'fiber' => 12.3,
            'image' => '/ingredients/oatflour.jpg',
            'serving_name' => 'cup',
            'serving_grams' => 100,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Egg',
            'calories' => 155,
            'protein' => 13,
            'carbohydrates' => 1.1,
            'fat' => 11,
            'sugar' => 1.1,
            'fiber' => 0,
            'image' => '/ingredients/eggs.jpg',
            'serving_name' => 'egg',
            'serving_grams' => 68,
        ]);
    }
}
