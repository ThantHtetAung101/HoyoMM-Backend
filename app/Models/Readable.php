<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Readable extends Model
{
    use HasFactory;

    public function world(): BelongsTo {
        return $this->belongsTo(World::class);
    }

    public function parts(): HasMany {
        return $this->hasMany(ReadablePart::class);
    }
}
