<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainReward extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'day',
        'level',
        'adventure_experience',
        'companionship_experience',
        'mora',
        'item_name',
        'drop_min',
        'drop_max'
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
