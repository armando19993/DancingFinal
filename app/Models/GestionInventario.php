<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionInventario extends Model
{
    use HasFactory;

    public function autorizado()
    {
        return $this->hasOne(User::class, 'id', 'usuario_id');
    }

    public function l_salida()
    {
        return $this->hasOne(Locale::class, 'id', 'local_salida');
    }

    public function l_entrada()
    {
        return $this->hasOne(Locale::class, 'id', 'local_entrada');
    }
}
