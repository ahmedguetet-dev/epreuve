<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Epreuve extends Model
{
    public function matiere(): BelongsTo
    {
        return $this->belongsTo(Matiere::class);
    }
}