<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matiere extends Model
{
    public function epreuves(): HasMany
    {
        return $this->hasMany(Epreuve::class);
    }
}