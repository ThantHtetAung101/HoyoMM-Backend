<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Faction extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array',
    ];

    public function entity(): MorphTo
    {
        return $this->morphTo();
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
