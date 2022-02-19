<?php

namespace App\Http\Controllers;

use App\Models\AuditoriaInventario;
use App\Http\Requests\StoreAuditoriaInventarioRequest;
use App\Http\Requests\UpdateAuditoriaInventarioRequest;
use App\Models\Locale;
use Illuminate\Support\Facades\Auth;

class AuditoriaInventarioController extends Controller
{
    public function index()
    {
        $local = Locale::find(Auth::user()->local_id);
        return view('module.auditorias', [
            'local' => $local
        ]);
    }

   
}
