<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassiveTalent extends Model
{
    use HasFactory;

    protected $table = 'passive_talents';


    protected $fillable = ['character_id', 'name', 'unlock', 'description', 'level'];

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }
}
