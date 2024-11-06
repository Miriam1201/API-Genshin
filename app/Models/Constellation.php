<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constellation extends Model
{
    use HasFactory;

    protected $table = 'constellations';


    protected $fillable = ['character_id', 'name', 'unlock', 'description', 'level'];

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }
}
