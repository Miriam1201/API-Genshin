<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{
    use HasFactory;

    protected $fillable = ['boss_id', 'name', 'rarity', 'source'];

    public function boss()
    {
        return $this->belongsTo(Boss::class);
    }
}
