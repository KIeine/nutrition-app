<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Meal;
use Illuminate\Http\Request;

class GenerateMealsController extends Controller
{
    public function generate(Request $request)
    {
        $validated = $request->validate([
            'calories' => 'required|integer|min:1000',
            'exclude' => 'nullable|array|max:50',
            'include' => 'nullable|array|max:50',
        ]);

        $mealCalories = $validated['calories'] / 3;

        $breakfasts = $this->filterMeals('breakfast', $mealCalories, $request->get('exclude'), $request->get('include'));
        $lunches = $this->filterMeals('lunch', $mealCalories, $request->get('exclude'), $request->get('include'));
        $dinners = $this->filterMeals('dinner', $mealCalories, $request->get('exclude'), $request->get('include'));

        $breakfast = $breakfasts ? collect($breakfasts)->random() : null;
        $lunch = $lunches ? collect($lunches)->random() : null;
        $dinner = $dinners ? collect($dinners)->random() : null;

        return inertia('Home', [
            'totalCalories' => $this->countCalories($breakfast, $lunch, $dinner),
            'breakfast' => $breakfast,
            'lunch' => $lunch,
            'dinner' => $dinner,
            'ingredients' => Ingredient::all()
        ]);
    }

    public function filterMeals($type, $mealCalories, $excludedIngredients, $includedIngredients)
    {
        $meals = $this->filterByCalories($type, $mealCalories);

        if (count($excludedIngredients)) {
            $meals = $this->filterByIngredients($meals, $excludedIngredients);
        }

        if (count($includedIngredients)) {
            $meals = $this->filterByIngredients($meals, $includedIngredients, false);
        }

        return $meals;
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

    public function filterByIngredients($meals, $ingredients, $exclude = true)
    {
        $haystackIds = collect($ingredients)->transform(fn ($ing) => $ing['id'])->toArray();

        $meals = array_filter($meals, function ($meal) use ($haystackIds, $exclude) {
            $ingredientsId = $meal['ingredients']->map(fn ($i) => $i['id'])->toArray();
            $result = array_intersect($ingredientsId, $haystackIds) === $haystackIds;
            return $exclude ? !$result : $result;
        });

        return $meals;
    }

    public function countCalories($breakfast, $lunch, $dinner)
    {
        $breakfast = $breakfast ? $breakfast['calories'] : 0;
        $lunch = $lunch ? $lunch['calories'] : 0;
        $dinner = $dinner ? $dinner['calories'] : 0;

        return round($breakfast + $lunch + $dinner);
    }
}
