<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'usuario_id');
    }

    public function relacion()
    {
        return $this->hasMany(RelacionCaja::class, 'caja_id', 'id');
    }
}
