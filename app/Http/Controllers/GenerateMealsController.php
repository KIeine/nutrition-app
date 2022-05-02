<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class GenerateMealsController extends Controller
{
    public function generate(Request $request)
    {
        $validated = $request->validate([
            'calories' => 'required|integer|min:1000',
        ]);

        $mealCalories = $validated['calories'] / 3;

        $breakfasts = $this->filterByCalories('breakfast', $mealCalories);
        $lunches = $this->filterByCalories('lunch', $mealCalories);
        $dinners = $this->filterByCalories('dinner', $mealCalories);

        $breakfast = $breakfasts ? collect($breakfasts)->random() : null;
        $lunch = $lunches ? collect($lunches)->random() : null;
        $dinner = $dinners ? collect($dinners)->random() : null;

        return inertia('Home', [
            'totalCalories' => $this->countCalories($breakfast, $lunch, $dinner),
            'breakfast' => $breakfast,
            'lunch' => $lunch,
            'dinner' => $dinner,
        ]);
    }

    public function filterByCalories($type, $mealCalories, $error = 200)
    {
        $meals = Meal::where('type', $type)->get()->map(fn ($item) => [
            'id' => $item->id,
            'title' => $item->title,
            'description' => $item->description,
            'ingredients' => $item->ingredients,
            'calories' => $item->totals['calories'],
        ])->toArray();

        return array_filter($meals, fn ($item) => ($item['calories']
            <= $mealCalories + $error)
            && $item['calories'] >= $mealCalories - $error);
    }

    public function countCalories($breakfast, $lunch, $dinner)
    {
        $breakfast = $breakfast ? $breakfast['calories'] : 0;
        $lunch = $lunch ? $lunch['calories'] : 0;
        $dinner = $dinner ? $dinner['calories'] : 0;

        return round($breakfast + $lunch + $dinner);
    }
}
