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
           
        }
        else{
            $this->productos = Inventario::where('local_id', $this->local)->with('producto')->get();
        }
    }


    public function actualizarInventario($id)
    {
        $this->inventario = Inventario::find($id);
        $this->cantidad = $this->inventario->inventario;
        $this->view = "editar";
    }

    public function updateInventario()
    {
        $inventario = $this->inventario;
        $inventario->inventario = $this->cantidad;
        $inventario->save();

        $this->productos = Inventario::where('local_id', $this->local)->with('producto')->get();
        $this->view = "inventario_completo";
    }
}
