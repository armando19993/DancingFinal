<?php

namespace App\Http\Livewire;

use App\Models\Inventario;
use App\Models\Locale;
use Livewire\Component;

class InventarioComponent extends Component
{
    public $view = "inventario_completo";
    public $locales, $local, $productos=null;

    public function render()
    {
        $this->locales = Locale::all();
        return view('livewire.inventario-component');
    }

    public function cambiarLocal()
    {
        if( $this->local == 0)
        {
            $this->productos = Inventario::where('local_id', $this->local)->with('inventario')->sum('inventario');
           
            dd($this->productos);
        }
        else{
            $this->productos = Inventario::where('local_id', $this->local)->with('producto')->get();
        }
        

    }
}
