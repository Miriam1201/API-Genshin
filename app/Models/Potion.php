<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'effect',
        'rarity',
    ];

    public $incrementing = false;

    /**
     * Relación con los requisitos de elaboración.
     */
    public function craftingRequirements()
    {
        return $this->hasMany(CraftingRequirement::class, 'potion_id');
    }
}
