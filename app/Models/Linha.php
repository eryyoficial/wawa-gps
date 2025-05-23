<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Linha extends Model
{
    use HasFactory;

     protected $fillable = ['numero', 'destino', 'geometria'];

    public function autocarros(): HasMany
    {
        return $this->hasMany(Autocarro::class);
    }

    public function paragems(): HasMany
    {
        return $this->hasMany(Paragem::class)->orderBy('ordem');
    }
    

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}