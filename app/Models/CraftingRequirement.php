<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CraftingRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'potion_id',
        'item_name',
        'quantity',
    ];

    /**
     * Relación con potions.
     */
    public function potion()
    {
        return $this->belongsTo(Potion::class, 'potion_id');
    }
}
