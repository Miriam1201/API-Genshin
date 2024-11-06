<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterAscension extends Model
{
    protected $table = 'character_ascension';
    use HasFactory;

    protected $fillable = ['id', 'type', 'name', 'sources', 'rarity'];
    protected $casts = [
        'sources' => 'array'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
