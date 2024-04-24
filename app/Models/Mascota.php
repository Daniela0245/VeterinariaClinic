<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'especie', 'raza', 'edad', 'dueno_id'];

    // Definir relación con Dueño
    public function dueno()
    {
        return $this->belongsTo(Dueno::class);
    }

    // Definir relación con Visitas
    public function visitas()
    {
        return $this->hasMany(Visita::class);
    }
}
