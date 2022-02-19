<?php

namespace App\Http\Controllers;

use App\Models\Locale;

use App\Models\Locale as ModelsLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocaleController extends Controller
{

    public function index()
    {
        $local = ModelsLocale::find(Auth::user()->local_id);
        return view('module.locales', [
            'local' => $local
        ]);
    }

   
}
