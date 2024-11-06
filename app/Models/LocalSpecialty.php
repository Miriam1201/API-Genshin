<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalSpecialty extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'region', 'name', 'characters'];
    protected $casts = [
        'characters' => 'array'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
