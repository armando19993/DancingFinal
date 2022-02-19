<?php

namespace App\Http\Livewire;

use App\Models\GestionInventario;
use App\Models\Locale;
use App\Models\Producto;
use App\Models\RelacionGestionInventario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class GestionInventarioComponent extends Component
{

    public $view = "list";

    public $locales, $desde, $hasta, $boton = true, $relaciones, $id_local, $relacion, $status;
    public $producto_nombre;

    public function render()
    {
        $gestiones = GestionInventario::with(['autorizado', 'l_salida', 'l_entrada'])->get();
        return view('livewire.gestion-inventario-component', [
            'gestiones' => $gestiones
        ]);
    }

    public function crearMovimiento()
    {
        $this->locales = Locale::all();
        $this->view = "movimiento_nuevo";
    }

    public function iniciarMovimiento()
    {
        $this->productos = Producto::with('inventarios')->get();

        $gestion = new GestionInventario();
        $gestion->usuario_id = Auth::user()->id;
        $gestion->tipo_gestion = 1;
        $gestion->local_salida = $this->desde;
        $gestion->local_entrada = $this->hasta;
        $gestion->fecha_emision = date('Y-m-d');
        $gestion->fecha_entrega = date('Y-m-d');
        $gestion->status = 1; 
        $gestion->save(); 
        $this->status = 1;

        foreach ($this->productos as $producto ) {
            $rel = new RelacionGestionInventario();
            $rel->gestion_id = $gestion->id;
            $rel->producto_id = $producto->id;
            $rel->cantidad = 0;
            $rel->cantidad_entregada = 0;
            $rel->por_entregar = 0;
            foreach ($producto->inventarios as $inventario)
            {
                if($inventario->local_id == $this->desde)
                {
                    $rel->inventario_disponible_previo = $inventario->inventario;
                }
            }
            $rel->save();
        }
        
        $this->relaciones = RelacionGestionInventario::where('gestion_id', $gestion->id)->with('producto')->get();

        
        $this->boton = false;
    }

    public function editarMovimiento( $id )
    {
        $this->locales = Locale::all();
        $this->gestion = GestionInventario::find($id);
        $this->status = $this->gestion->status;
        $this->desde = $this->gestion->local_salida;
        $this->hasta = $this->gestion->local_entrada;
        $this->relaciones = RelacionGestionInventario::where('gestion_id', $id)->with('producto')->get();
        $this->view = "editar_movimiento";
    }
    
    public function regresarGestion()
    {
        $this->editarMovimiento($this->gestion->id);
    }

    public function editarDetalle( $id )
    {
        $relacion = RelacionGestionInventario::where('id', $id)->with('producto')->first();
        $this->relacion = $relacion;

        $this->producto_nombre = $relacion->producto->nombre;
        $this->inventario_disponible = $relacion->inventario_disponible_previo;
        $this->inventario_enviar = $relacion->cantidad;


        $this->view = "editar_detalle";
    }

    public function updateDetalle()
    {
        $relacion = RelacionGestionInventario::where('id', $this->relacion->id)->first();
        $relacion->cantidad = $this->inventario_enviar;
        $relacion->save();

        $this->editarMovimiento($this->gestion->id);
    }

    public function cerrarMovimiento()
    {
        $gestion = $this->gestion;
        $gestion->status = 2;
        $gestion->save();

        $this->editarMovimiento($this->gestion->id);
    }
}
