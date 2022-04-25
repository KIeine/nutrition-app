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
        return [
            'calories' => round($this->ingredients->sum('calories'), 2),
            'carbohydrates' => round($this->ingredients->sum('carbohydrates'), 2),
            'protein' => round($this->ingredients->sum('protein'), 2),
            'fat' => round($this->ingredients->sum('fat'), 2),
            'sugar' => round($this->ingredients->sum('sugar'), 2),
            'fiber' => round($this->ingredients->sum('fiber'), 2),
        ];
    }
}
