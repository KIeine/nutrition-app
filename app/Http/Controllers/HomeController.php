<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;

class HomeController extends Controller
{
    public function __invoke()
    {
        return inertia('Home', [
            'ingredients' => Ingredient::all()
        ]);
    }
}
