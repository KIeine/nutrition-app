<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealPostRequest;
use App\Models\Ingredient;
use App\Models\Meal;
use Illuminate\Http\Request;
use Storage;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::paginate(10)->through(fn ($meal) => [
            'id' => $meal->id,
            'title' => $meal->title,
            'description' => $meal->description,
            'image' => $meal->image,
            'totals' => $meal->totals,
        ]);

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
            $validated['image'] = "/$path";
        }

        $meal = Meal::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'image' => $validated['image'],
            'user_id' => auth()->id(),
        ]);

        foreach ($validated['ingredients'] as $ingredient) {
            $meal->ingredients()->attach($ingredient, [
                'notes' => $validated['notes'][$ingredient] ?? null,
                'serving_quantity' => $validated['quantities'][$ingredient] ?? 1,
            ]);
        }

        return redirect()->back();
    }

    public function show(Meal $meal)
    {
        $mealIngredients = $meal->ingredients->map(fn ($ingredient) => [
            'id' => $ingredient->id,
            'name' => $ingredient->name,
            'image' => $ingredient->image,
            'serving_name' => $ingredient->serving_name,
            'serving_grams' => $ingredient->serving_grams,
            'notes' => $ingredient->pivot->notes,
            'serving_quantity' => $ingredient->pivot->serving_quantity,
        ]);

        return inertia('MealsShow', [
            'meal' => $meal,
            'ingredients' => Ingredient::all(),
            'mealIngredients' => $mealIngredients,
            'totals' => $meal->totals,
            'auth' => [
                'submitted_by' => $meal->user->name,
                'can_edit' => auth()->id() === $meal->user_id,
            ]
        ]);
    }

    public function update(Request $request, Meal $meal)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|max:2000',
            'type' => 'required|string|max:255',
            'ingredients' => 'required|array|max:50',
            'notes' => 'nullable|array|max:50',
            'notes.*' => 'nullable|string|max:255',
            'quantities' => 'nullable|array|max:50',
            'quantities.*' => 'nullable|numeric|gte:0.1',
        ]);

        $image = $request->file('image');
        if (isset($image)) {
            $name = time() . '.' . $image->getClientOriginalExtension();

            $path = Storage::disk('public')->putFileAs('meals', $image, $name);
            $validated['image'] = "/$path";
        }

        foreach ($validated['ingredients'] as $index) {
            $ingredient = Ingredient::findOrFail($index);
            $meal->ingredients()->updateExistingPivot($ingredient, [
                'notes' => $validated['notes'][$index] ?? $ingredient->notes,
                'serving_quantity' => $validated['quantities'][$index] ?? $ingredient->serving_quantity,
            ]);
        }

        $meal->update($validated);
        $meal->save();

        return redirect()->back();
    }
}
