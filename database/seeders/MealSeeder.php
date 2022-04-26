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

        DB::table('meals')->insert([
            'user_id' => 1,
            'title' => 'Avocado egg toast',
            'type' => 'breakfast',
            'description' => 'Description'
        ]);

        DB::table('ingredient_meal')->insert([
            'meal_id' => 2,
            'ingredient_id' => 1,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 2,
            'ingredient_id' => 4,
            'serving_quantity' => 2,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 2,
            'ingredient_id' => 7,
            'serving_quantity' => 2,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 2,
            'ingredient_id' => 6,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 2,
            'ingredient_id' => 5,
            'serving_quantity' => 0.25,
        ]);

        DB::table('meals')->insert([
            'user_id' => 1,
            'title' => 'Overnight oats',
            'type' => 'breakfast',
            'description' => 'Description'
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 3,
            'ingredient_id' => 2,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 3,
            'ingredient_id' => 8,
            'serving_quantity' => 0.5,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 3,
            'ingredient_id' => 9,
            'serving_quantity' => 0.5,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 3,
            'ingredient_id' => 10,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 3,
            'ingredient_id' => 11,
            'serving_quantity' => 2,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 3,
            'ingredient_id' => 12,
            'serving_quantity' => 0.1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 3,
            'ingredient_id' => 13,
            'serving_quantity' => 1,
        ]);

        DB::table('meals')->insert([
            'user_id' => 1,
            'title' => 'Strawberry avocado spinach salad',
            'type' => 'Lunch',
            'description' => 'Description'
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 4,
            'ingredient_id' => 1,
            'serving_quantity' => 0.5,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 4,
            'ingredient_id' => 14,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 4,
            'ingredient_id' => 15,
            'serving_quantity' => 4,
        ]);
        DB::table('meals')->insert([
            'user_id' => 1,
            'title' => 'Tuna and Avocado wrap',
            'type' => 'Lunch',
            'description' => 'Description'
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 5,
            'ingredient_id' => 1,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 5,
            'ingredient_id' => 16,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 5,
            'ingredient_id' => 17,
            'serving_quantity' => 4,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 5,
            'ingredient_id' => 5,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 5,
            'ingredient_id' => 6,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 5,
            'ingredient_id' => 18,
            'serving_quantity' => 2,
            'notes' => 'Chopped',
        ]);

        DB::table('meals')->insert([
            'user_id' => 1,
            'title' => 'Spinach tuna pasta',
            'type' => 'Lunch',
            'description' => 'Description'
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 6,
            'ingredient_id' => 19,
            'serving_quantity' => 0.5,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 6,
            'ingredient_id' => 20,
            'serving_quantity' => 0.5,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 6,
            'ingredient_id' => 21,
            'serving_quantity' => 2,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 6,
            'ingredient_id' => 5,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 6,
            'ingredient_id' => 15,
            'serving_quantity' => 2,
        ]);

        DB::table('meals')->insert([
            'user_id' => 1,
            'title' => 'Lettuce and spinach salad',
            'type' => 'Lunch',
            'description' => 'Description'
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 17,
            'serving_quantity' => 2,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 18,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 15,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 22,
            'serving_quantity' => 0.5,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 23,
            'serving_quantity' => 1,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 24,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 25,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 5,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 6,
            'serving_quantity' => 0.25,
        ]);
        DB::table('ingredient_meal')->insert([
            'meal_id' => 7,
            'ingredient_id' => 26,
            'serving_quantity' => 0.5,
        ]);
    }
}
