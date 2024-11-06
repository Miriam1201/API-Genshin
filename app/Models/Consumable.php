<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'rarity',
        'type',
        'effect',
        'has_recipe',
        'description',
        'proficiency',
    ];

    public $incrementing = false;

    /**
     * Relación con recetas.
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'consumable_id');
    }
}
