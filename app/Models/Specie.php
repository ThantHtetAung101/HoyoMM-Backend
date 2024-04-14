<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Specie extends Model
{
    use HasFactory;

    protected $casts = [
        'content' => 'array',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function world(): BelongsTo
    {
        return $this->belongsTo(World::class);
    }
}
