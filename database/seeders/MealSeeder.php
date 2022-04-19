<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meals')->insert([
            'user_id' => 1,
            'title' => 'Banana pancakes',
            'type' => 'breakfast',
            'image' => '/meals/banana-pancakes.jpg',
            'description' => 'Peel and mash a banana, mix with the egg, flour and a little bit of baking powder if you want the pancakes to rise a bit and cook.',
        ]);

        DB::table('ingredient_meal')->insert([
            'meal_id' => 1,
            'ingredient_id' => 2,
            'serving_quantity' => 1,
            'notes' => 'Choose a riped banana.'
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 1,
            'ingredient_id' => 3,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 1,
            'ingredient_id' => 4,
            'serving_quantity' => 1,
        ]);
    }
}
