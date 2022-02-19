<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesasRestaurante extends Model
{
    use HasFactory;

    public function pedido()
    {
        return $this->hasOne(PedidoRestaurante::class, 'mesa_id', 'id')->where('status', 1);
    }
}
