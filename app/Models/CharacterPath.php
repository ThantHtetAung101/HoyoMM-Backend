<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CharacterPath extends Model
{
    use HasFactory;

    public function path(): BelongsTo {
        return $this->belongsTo(Path::class);
    }
}
