<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $favourites = auth()->user()->favourites->sortByDesc('created_at')->values()->map(function ($fav) {
            $breakfast = Meal::find($fav->breakfast_id);
            $lunch = Meal::find($fav->lunch_id);
            $dinner = Meal::find($fav->dinner_id);

            return [
                'id' => $fav->id,
                'breakfast' => $breakfast,
                'lunch' => $lunch,
                'dinner' => $dinner,
                'calories' => $this->countCalories($breakfast, $lunch, $dinner),
                'created_at' => date_format($fav->created_at, 'd M \'y')
            ];
        });

        return inertia('Profile', ['favourites' => $favourites]);
    }

    public function countCalories($breakfast, $lunch, $dinner)
    {
        $breakfast = $breakfast->totals['calories'];
        $lunch = $lunch->totals['calories'];
        $dinner = $dinner->totals['calories'];

        return round($breakfast + $lunch + $dinner);
    }
}
