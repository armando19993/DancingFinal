<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoRestaurante extends Model
{
    use HasFactory;

    public function mozo()
        {
            return $this->hasOne(MozoRestaurante::class, 'id', 'mozo_id');
        }


    public function mesa(){
        return $this->hasOne(MesasRestaurante::class, 'id', 'mesa_id');
    }

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }
}
