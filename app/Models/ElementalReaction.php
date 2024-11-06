<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementalReaction extends Model
{
    use HasFactory;

    protected $fillable = ['element_id', 'reaction_name', 'description'];

    public function element()
    {
        return $this->belongsTo(Element::class);
    }

    public function reactionElements()
    {
        return $this->hasMany(ReactionElement::class, 'reaction_id');
    }
}
