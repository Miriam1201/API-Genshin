<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'max_rarity',
        '2_piece_bonus',
        '4_piece_bonus',
        'image_path',
    ];

    // Accesor para la URL de la imagen
    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return null;
    }

    // Forzar que el id siempre sea string
    public function getIdAttribute($value)
    {
        return (string) $value;
    }

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'artifact_character');
    }
}
