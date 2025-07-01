<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
protected $fillable = [
    'codigo',
    'dia',
    'hora_inicio',
    'hora_fin',
    'turno',
    'periodo',
    'necesita_reserva',
    'materia_id',
];



    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}

