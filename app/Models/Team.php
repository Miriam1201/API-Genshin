<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'main_dps',
        'sub_dps',
        'support',
        'healer_shielder',
    ];

    public function mainDps()
    {
        return $this->belongsTo(Character::class, 'main_dps');
    }

    public function subDps()
    {
        return $this->belongsTo(Character::class, 'sub_dps');
    }

    public function support()
    {
        return $this->belongsTo(Character::class, 'support');
    }

    public function healerShielder()
    {
        return $this->belongsTo(Character::class, 'healer_shielder');
    }
}