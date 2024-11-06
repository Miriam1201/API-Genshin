<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillTalent extends Model
{
    use HasFactory;

    protected $table = 'skill_talents';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'character_id',
        'name',
        'unlock',
        'description',
        'type',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }
}
