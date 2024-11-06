<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'description', 'rarity', 'sources'];
    protected $casts = [
        'sources' => 'array'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
