<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'serving_name',
        'serving_grams',
        'calories',
        'carbohydrates',
        'fat',
        'protein',
        'fiber',
        'sugar',
        'image',
    ];

    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
}
