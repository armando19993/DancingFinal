<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'producto_id', 'id');
    }
}
