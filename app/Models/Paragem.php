<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paragem extends Model
{
    use HasFactory;

    protected $fillable = [
        'linha_id',
        'nome',
        'latitude',
        'longitude',
        'ordem',
    ];

    public function linha(): BelongsTo
    {
        return $this->belongsTo(Linha::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}