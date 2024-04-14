<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CharacterElement extends Model
{
    use HasFactory;

    public function element(): BelongsTo {
        return $this->belongsTo(Element::class);
    }
}
