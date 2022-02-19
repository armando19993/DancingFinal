<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Http\Requests\StoreInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;
use App\Models\Locale;
use Illuminate\Support\Facades\Auth;

class InventarioController extends Controller
{
  
    public function index()
    {
        $local = Locale::find(Auth::user()->local_id);
        return view('module.inventario', [
            'local' => $local
        ]);
    }

    
}
