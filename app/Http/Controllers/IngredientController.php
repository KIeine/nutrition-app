<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientPostRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::paginate(10);
        return inertia('IngredientsIndex', ['ingredients' => $ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientPostRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();

            $path = Storage::disk('public')->putFileAs('ingredients', $image, $name);
            $validated['image'] = "/$path";
        }

        Ingredient::create($validated);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        $meals = $ingredient->meals->sortBy('createdAt')->take(5)->map(
            fn ($meal) => [
                'id' => $meal->id,
                'title' => $meal->title,
                'image' => $meal->image,
            ]
        )->all();

        return inertia('IngredientsShow', [
            'ingredient' => $ingredient,
            'meals' => $meals
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'serving_name' => 'nullable|string|max:255',
            'serving_grams' => 'required|numeric|gte:0',
            'calories' => 'required|numeric|gte:0',
            'carbohydrates' => 'required|numeric|gte:0',
            'fat' => 'required|numeric|gte:0',
            'protein' => 'required|numeric|gte:0',
            'fiber' => 'nullable|numeric|gte:0',
            'sugar' => 'nullable|numeric|gte:0',
        ]);

        $image = $request->file('image');
        if (isset($image)) {
            $name = time() . '.' . $image->getClientOriginalExtension();

            $path = Storage::disk('public')->putFileAs('ingredients', $image, $name);
            $validated['image'] = "/$path";
        }

        $ingredient->update($validated);
        $ingredient->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
