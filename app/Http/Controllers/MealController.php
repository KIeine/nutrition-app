<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealPostRequest;
use App\Models\Ingredient;
use App\Models\Meal;
use Storage;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::paginate(10);
        $ingredients = Ingredient::all();

        return inertia('MealsIndex', [
            'meals' => $meals,
            'ingredients' => $ingredients
        ]);
    }

    public function store(MealPostRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();

            $path = Storage::disk('public')->putFileAs('meals', $image, $name);
            $validated['image'] = $path;
        }

        $meal = Meal::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'image' => $validated['image'],
        ]);

        foreach ($validated['ingredients'] as $ingredient) {
            $meal->ingredients()->attach($ingredient, [
                'notes' => $validated['notes'][$ingredient] ?? null,
                'serving_quantity' => $validated['quantities'][$ingredient] ?? 1,
            ]);
        }

        return redirect()->back();
    }
}
