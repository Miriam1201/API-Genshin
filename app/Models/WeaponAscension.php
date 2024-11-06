<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponAscension extends Model
{

    protected $table = 'weapon_ascension';

    use HasFactory;

    protected $fillable = ['id', 'weapons', 'availability', 'source', 'items'];
    protected $casts = [
        'weapons' => 'array',
        'availability' => 'array',
        'items' => 'array'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
