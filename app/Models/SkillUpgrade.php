<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillUpgrade extends Model
{
    use HasFactory;

    protected $table = 'skill_upgrades';

    protected $fillable = ['skill_talent_id', 'name', 'value'];

    public function skillTalent()
    {
        return $this->belongsTo(SkillTalent::class);
    }
}
