<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Locale;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{

    public function index()
    {
        $local = Locale::find(Auth::user()->local_id);
        return view('module.categorias', [
            'local' => $local
        ]);
    }

}
