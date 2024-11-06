<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentBook extends Model
{

    protected $table = 'talent_book';

    use HasFactory;

    protected $fillable = ['id', 'type', 'characters', 'availability', 'source', 'items'];
    protected $casts = [
        'characters' => 'array',
        'availability' => 'array',
        'items' => 'array'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
