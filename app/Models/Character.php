<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'title',
        'vision',
        'weapon',
        'gender',
        'nation',
        'affiliation',
        'rarity',
        'release',
        'constellation',
        'birthday',
        'description',
        'card',
        'icon_big',
    ];

    public function skillTalents()
    {
        return $this->hasMany(SkillTalent::class, 'character_id');
    }

    public function passiveTalents()
    {
        return $this->hasMany(PassiveTalent::class, 'character_id');
    }

    public function constellations()
    {
        return $this->hasMany(Constellation::class, 'character_id');
    }

    public function artifacts()
    {
        return $this->belongsToMany(Artifact::class, 'artifact_character');
    }

    public function teamsAsMainDps()
    {
        return $this->hasMany(Team::class, 'main_dps');
    }

    public function teamsAsSubDps()
    {
        return $this->hasMany(Team::class, 'sub_dps');
    }

    public function teamsAsSupport()
    {
        return $this->hasMany(Team::class, 'support');
    }

    public function teamsAsHealerShielder()
    {
        return $this->hasMany(Team::class, 'healer_shielder');
    }
}