<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'type',
        'description',
        'location',
        'nation'
    ];

    public function requirements()
    {
        return $this->hasMany(DomainRequirement::class);
    }

    public function rewards()
    {
        return $this->hasMany(DomainReward::class);
    }
}
