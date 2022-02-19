<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Locale;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{

    public function index()
    {
        $local = Locale::find(Auth::user()->local_id);
        return view('module.productos', [
            'local' => $local
        ]);
    }

    
}
