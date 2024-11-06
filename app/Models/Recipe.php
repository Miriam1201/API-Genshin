<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'consumable_id',
        'item_name',
        'quantity',
    ];

    /**
     * Relación con consumable.
     */
    public function consumable()
    {
        return $this->belongsTo(Consumable::class, 'consumable_id');
    }
}
