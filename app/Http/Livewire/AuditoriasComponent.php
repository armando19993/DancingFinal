<?php

namespace App\Http\Livewire;

use App\Models\AuditoriaInventario;
use App\Models\Locale;
use App\Models\Producto;
use App\Models\RelacionAuditoriaInventario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AuditoriasComponent extends Component
{

    public $view = "list";
    public $local, $auditoria;


    public function render()
    {
        $auditorias = AuditoriaInventario::with(['local', 'autorizado'])->get();
        return view('livewire.auditorias-component', [
            'auditorias' => $auditorias
        ]);
    }

    public function default()
    {
        $this->view = "list";
    }

    public function crearAuditoria()
    {
        $this->locales = Locale::all();
        $this->view = "crear";
    }

    public function storeAuditoria()
    {
        $aut = new AuditoriaInventario();
        $aut->autorizado_por = Auth::user()->id;
        $aut->solicitado_local = $this->local;
        $aut->fecha = date('Y-m-d');
        $aut->estado = 1;
        $aut->save();

        $productos = Producto::with('inventarios')->get();

        foreach ($productos as $producto ) {
            $rel = new RelacionAuditoriaInventario();
            $rel->auditoria_id = $aut->id;
            $rel->cargado_por = 0;
            $rel->producto_id = $producto->id;
            foreach ($producto->inventarios as $inventario)
            {
                if($inventario->local_id == $this->local)
                {
                    $rel->debe_haber = $inventario->inventario;
                }
            }
            $rel->existencias = 0;
            $rel->diferencia = 0;
            $rel->save();
        }
        
        $this->default();
    }


    public function verRelacion( $id )
    {
        $this->auditoria = AuditoriaInventario::where('id', $id)->with('local')->first();

        $this->relaciones_auditoria = RelacionAuditoriaInventario::where('auditoria_id', $id)->with(['cargado_por', 'producto'])->get();

        $this->view = "relacion_auditoria";
    }
}
