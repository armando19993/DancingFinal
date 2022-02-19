<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionAuditoriaInventario extends Model
{
    use HasFactory;

    public function cargado_por()
    {
        return $this->hasOne(User::class, 'id', 'cargador_por');
    }

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }
}
