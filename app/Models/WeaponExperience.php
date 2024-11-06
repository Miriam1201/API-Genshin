<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponExperience extends Model
{

    protected $table = 'weapon_experience';

    use HasFactory;

    protected $fillable = ['id', 'name', 'experience', 'rarity', 'source'];
    protected $casts = [
        'source' => 'array'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
