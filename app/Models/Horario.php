<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['linha_id', 'paragem_id', 'hora_partida', 'dia_semana', 'observacoes'];

    public function linha()
    {
        return $this->belongsTo(Linha::class);
    }

    public function paragem()
    {
        return $this->belongsTo(Paragem::class);
    }
}
