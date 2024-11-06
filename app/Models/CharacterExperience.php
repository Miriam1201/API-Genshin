<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterExperience extends Model
{
    protected $table = 'character_experience';

    use HasFactory;

    protected $fillable = ['id', 'name', 'experience', 'rarity'];
    public $incrementing = false;
    protected $keyType = 'string';
}
