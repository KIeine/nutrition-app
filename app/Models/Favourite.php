<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'breakfast_id',
        'lunch_id',
        'dinner_id'
    ];

    public function breakfast()
    {
        return $this->belongsTo(Meal::class);
    }

    public function lunch()
    {
        return $this->belongsTo(Meal::class);
    }

    public function dinner()
    {
        return $this->belongsTo(Meal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
