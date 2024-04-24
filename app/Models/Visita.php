<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $fillable = ['mascota_id', 'fecha_visita', 'motivo', 'tratamiento'];

    // Definir relación con Mascota
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
