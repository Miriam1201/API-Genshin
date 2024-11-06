<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enemy extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'name', 'description', 'region', 'type', 'family', 'faction', 'mora_gained'];

    public function elements()
    {
        return $this->hasMany(EnemyElement::class);
    }

    public function drops()
    {
        return $this->hasMany(EnemyDrop::class);
    }

    public function artifacts()
    {
        return $this->hasMany(EnemyArtifact::class);
    }

    public function descriptions()
    {
        return $this->hasMany(EnemyDescription::class);
    }
}
