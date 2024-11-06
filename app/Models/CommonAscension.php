<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonAscension extends Model
{
    protected $table = 'common_ascension';

    use HasFactory;

    protected $fillable = ['id', 'type', 'characters', 'weapons', 'items', 'sources'];
    protected $casts = [
        'characters' => 'array',
        'weapons' => 'array',
        'items' => 'array',
        'sources' => 'array'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
