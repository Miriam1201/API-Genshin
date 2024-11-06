<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentBoss extends Model
{

    protected $table = 'talent_boss';

    use HasFactory;

    protected $fillable = ['id', 'name', 'characters'];
    protected $casts = [
        'characters' => 'array'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
