<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'description'];

    public function drops()
    {
        return $this->hasMany(Drop::class);
    }

    public function bossArtifacts()
    {
        return $this->belongsTo(Boss::class, 'boss_id', 'id');
    }
}
