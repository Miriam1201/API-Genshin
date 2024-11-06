<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BossArtifact extends Model
{
    use HasFactory;

    protected $fillable = ['boss_id', 'name', 'max_rarity'];

    public function boss()
    {
        return $this->hasMany(Boss::class, 'id');
    }
}
