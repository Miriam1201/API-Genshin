<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AscensionMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id',
        'level',
        'material_name',
        'value',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }
}
