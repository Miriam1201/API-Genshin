<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnemyArtifact extends Model
{
    use HasFactory;

    protected $fillable = ['enemy_id', 'artifact_name', 'set_name', 'rarity'];

    public function enemy()
    {
        return $this->belongsTo(Enemy::class);
    }
}
