<?php

namespace App\Http\Controllers;

use App\Models\Locale as ModelsLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Locale;

class HomeController extends Controller
{
    public function index()
    {
        Auth::loginUsingId(2);
        $local = ModelsLocale::find(Auth::user()->local_id);
        if(Auth::user()->tipo_usuario == 4)
        {
            return view('restaurante', [
                'local' => $local
            ]);
        }
        if(Auth::user()->tipo_usuario == 3)
        {
            return view('venta_normal', [
                'local' => $local
            ]);
        }
        else{
            return view('home', [
                'local' => $local
            ]);
        }
        
        
    }
}
