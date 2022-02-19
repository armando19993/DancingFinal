<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;

    protected $fillable = [
        'local',
        'administrador_id'
    ];

    public function administrador()
    {
        return $this->hasOne(User::class, 'id', 'administrador_id');
    }
}
