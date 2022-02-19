<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditoriaInventario extends Model
{
    use HasFactory;

    public function local()
    {
        return $this->hasOne(Locale::class, 'id', 'solicitado_local');
    }

    public function autorizado()
    {
        return $this->hasOne(User::class, 'id', 'autorizado_por');
    }
}
