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
            'name' => 'Avocado',
            'calories' => 160.1,
            'protein' => 2,
            'carbohydrates' => 9,
            'fat' => 15,
            'sugar' => 0.7,
            'fiber' => 7,
            'image' => '/ingredients/avocado.jpg',
            'serving_grams' => 120,
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
        DB::table('ingredients')->insert([
            'name' => 'Salt',
            'calories' => 0,
            'protein' => 0,
            'carbohydrates' => 0,
            'fat' => 0,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'tsp',
            'serving_grams' => 6,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Pepper',
            'calories' => 0,
            'protein' => 0,
            'carbohydrates' => 0,
            'fat' => 0,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'tsp',
            'serving_grams' => 3,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Bread',
            'calories' => 264,
            'protein' => 9,
            'carbohydrates' => 49,
            'fat' => 3.2,
            'sugar' => 5,
            'fiber' => 2.5,
            'serving_name' => 'slice',
            'serving_grams' => 30,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Rolled oats',
            'calories' => 389,
            'protein' => 16.9,
            'carbohydrates' => 66,
            'fat' => 7,
            'sugar' => 0,
            'fiber' => 12,
            'serving_name' => 'cup',
            'serving_grams' => 80,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Milk',
            'calories' => 39,
            'protein' => 1,
            'carbohydrates' => 3.5,
            'fat' => 3,
            'sugar' => 0,
            'fiber' => 0.5,
            'serving_name' => 'cup',
            'serving_grams' => 240,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Greek yoghurt',
            'calories' => 90,
            'protein' => 13,
            'carbohydrates' => 8,
            'fat' => 3,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'cup',
            'serving_grams' => 245,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Chia seeds',
            'calories' => 486,
            'protein' => 17,
            'carbohydrates' => 42,
            'fat' => 31,
            'sugar' => 0,
            'fiber' => 34,
            'serving_name' => 'tsp',
            'serving_grams' => 5,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Maple syrup',
            'calories' => 260,
            'protein' => 0,
            'carbohydrates' => 67,
            'fat' => 0.1,
            'sugar' => 67,
            'fiber' => 0,
            'serving_name' => 'cup',
            'serving_grams' => 340,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Cacao powder',
            'calories' => 227,
            'protein' => 20,
            'carbohydrates' => 58,
            'fat' => 14,
            'sugar' => 2,
            'fiber' => 33,
            'serving_name' => 'tbsp',
            'serving_grams' => 8,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Strawberries',
            'calories' => 32,
            'protein' => 0.7,
            'carbohydrates' => 8,
            'fat' => 0.3,
            'sugar' => 4.9,
            'fiber' => 2,
            'serving_name' => 'cup',
            'serving_grams' => 150,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Spinach',
            'calories' => 23,
            'protein' => 2.9,
            'carbohydrates' => 3.6,
            'fat' => 0.4,
            'sugar' => 0.4,
            'fiber' => 2.2,
            'serving_name' => 'cup',
            'serving_grams' => 30,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Tuna',
            'calories' => 131,
            'protein' => 28,
            'carbohydrates' => 0,
            'fat' => 3,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'can',
            'serving_grams' => 30,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Lettuce',
            'calories' => 10,
            'protein' => 1,
            'carbohydrates' => 2,
            'fat' => 1,
            'sugar' => 0,
            'fiber' => 0.5,
            'serving_name' => 'leaf',
            'serving_grams' => 15,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Scallions',
            'calories' => 30,
            'protein' => 1,
            'carbohydrates' => 2,
            'fat' => 1,
            'sugar' => 0,
            'fiber' => 0.5,
            'serving_name' => 'scallion',
            'serving_grams' => 15,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Pasta',
            'calories' => 350,
            'protein' => 5,
            'carbohydrates' => 70,
            'fat' => 4,
            'sugar' => 0,
            'fiber' => 3,
            'serving_name' => 'cup',
            'serving_grams' => 125,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Parmesan',
            'calories' => 430,
            'protein' => 38,
            'carbohydrates' => 4,
            'fat' => 29,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'cup',
            'serving_grams' => 80,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Garlic',
            'calories' => 140,
            'protein' => 6,
            'carbohydrates' => 30,
            'fat' => 1,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'clove',
            'serving_grams' => 6,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Chicken breast',
            'calories' => 164,
            'protein' => 30,
            'carbohydrates' => 0,
            'fat' => 3,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'breast',
            'serving_grams' => 170,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Olive oil',
            'calories' => 884,
            'protein' => 0,
            'carbohydrates' => 0,
            'fat' => 100,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'tbsp',
            'serving_grams' => 13,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Lemon juice',
            'calories' => 25,
            'protein' => 0,
            'carbohydrates' => 0,
            'fat' => 0,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'cup',
            'serving_grams' => 240,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Carrot',
            'calories' => 40,
            'protein' => 1,
            'carbohydrates' => 10,
            'fat' => 0,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'cup',
            'serving_grams' => 150,
        ]);
        DB::table('ingredients')->insert([
            'name' => 'Red onion',
            'calories' => 40,
            'protein' => 1,
            'carbohydrates' => 10,
            'fat' => 0,
            'sugar' => 0,
            'fiber' => 0,
            'serving_name' => 'onion',
            'serving_grams' => 200,
        ]);
    }
}
