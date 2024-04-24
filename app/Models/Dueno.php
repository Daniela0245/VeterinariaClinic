<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dueno extends Model
{
    protected $fillable = ['nombre', 'apellido', 'direccion', 'telefono', 'email'];

    // Definir relación con Mascotas
    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}
