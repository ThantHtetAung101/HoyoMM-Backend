<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array'
    ];
    public function worlds(): HasMany
    {
        return $this->hasMany(World::class);
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
