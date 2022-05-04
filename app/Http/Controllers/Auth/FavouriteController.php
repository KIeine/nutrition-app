<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'breakfast' => 'required|integer|exists:meals,id',
            'lunch' => 'required|integer|exists:meals,id',
            'dinner' => 'required|integer|exists:meals,id',
        ]);

        $favourite = Favourite::create([
            'user_id' => auth()->user()->id,
            'breakfast_id' => $request->breakfast,
            'lunch_id' => $request->lunch,
            'dinner_id' => $request->dinner,
        ]);

        auth()->user()->favourites()->save($favourite);

        return inertia('Home', session('generateMeals'));
    }

    public function destroy(Favourite $favourite)
    {
        $favourite->delete();
        return redirect()->back();
    }
}
