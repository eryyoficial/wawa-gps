<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Autocarro extends Model
{
    use HasFactory;

    protected $fillable = [
        'linha_id',
        'latitude',
        'longitude',
    ];

    public function linha(): BelongsTo
    {
        return $this->belongsTo(Linha::class);
    }
}