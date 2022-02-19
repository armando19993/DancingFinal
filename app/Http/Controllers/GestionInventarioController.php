<?php

namespace App\Http\Controllers;

use App\Models\GestionInventario;
use App\Http\Requests\StoreGestionInventarioRequest;
use App\Http\Requests\UpdateGestionInventarioRequest;
use App\Models\Locale;
use Illuminate\Support\Facades\Auth;

class GestionInventarioController extends Controller
{
    
    public function index()
    {
        $local = Locale::find(Auth::user()->local_id);
        return view('module.gestiones', [
            'local' => $local
        ]);
    }

}
