<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Meal;
use Illuminate\Http\Request;
use Storage;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::all();
        $ingredients = Ingredient::all();

        return inertia('MealsIndex', [
            'meals' => $meals,
            'ingredients' => $ingredients
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|max:2000',
            'type' => 'required|string|max:255',
            'ingredients' => 'required|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($request->all());

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

        $meal->ingredients()->attach($validated['ingredients']);

        return redirect()->back();
    }
}
