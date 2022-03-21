<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    public function breakfast()
    {
        return $this->belongsTo(Meal::class);
    }

    public function lunch()
    {
        return $this->belongsTo(Meal::class);
    }

    public function snack()
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
