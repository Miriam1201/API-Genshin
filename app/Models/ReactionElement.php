<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactionElement extends Model
{
    use HasFactory;

    public $incrementing = true;

    protected $fillable = ['reaction_id', 'element_name'];

    public function reaction()
    {
        return $this->belongsTo(ElementalReaction::class, 'reaction_id');
    }
}
