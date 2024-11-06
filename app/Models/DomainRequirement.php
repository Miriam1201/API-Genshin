<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'level',
        'adventure_rank',
        'recommended_level',
        'ley_line_disorder'
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
