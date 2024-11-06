<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnemyDescription extends Model
{
    use HasFactory;

    protected $fillable = ['enemy_id', 'description_name', 'description'];

    public function enemy()
    {
        return $this->belongsTo(Enemy::class);
    }
}
