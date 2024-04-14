<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Aeon extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array',
    ];

    public function path(): BelongsTo
    {
        return $this->belongsTo(Path::class);
    }

    public function factions(): MorphMany
    {
        return $this->morphMany(Faction::class, 'entity');
    }
}
