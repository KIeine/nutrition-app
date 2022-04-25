<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'image',
        'user_id'
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot('notes', 'serving_quantity')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalsAttribute()
    {
        $ingredients = $this->ingredients;

        $transformAttribute = function ($attr) use ($ingredients) {
            return round($ingredients->map(function ($ingredient) use ($attr) {
                return $ingredient->$attr * $ingredient->pivot->serving_quantity;
            })->sum(), 2);
        };

        return [
            'calories' => $transformAttribute('calories'),
            'carbohydrates' => $transformAttribute('carbohydrates'),
            'protein' => $transformAttribute('protein'),
            'fat' => $transformAttribute('fat'),
            'sugar' => $transformAttribute('sugar'),
            'fiber' => $transformAttribute('fiber'),
        ];
    }
}
