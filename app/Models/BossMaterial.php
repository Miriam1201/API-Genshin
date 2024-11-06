<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BossMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'source'];
    public $incrementing = false;
    protected $keyType = 'string';
}
