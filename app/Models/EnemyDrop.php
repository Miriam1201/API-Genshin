<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnemyDrop extends Model
{
    use HasFactory;

    protected $fillable = ['enemy_id', 'drop_name', 'rarity', 'minimum_level'];

    public function enemy()
    {
        return $this->belongsTo(Enemy::class);
    }
}
