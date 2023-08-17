<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caracteristicas extends Model
{
    use HasFactory, SoftDeletes;

    public function examen(): BelongsTo
    {
        return $this->belongsTo(Examen::class);
    }
}
