<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Path extends Model
{
    use HasFactory;

    public function factions(): MorphMany {
        return $this->morphMany(Faction::class, 'entity');
    }
}
