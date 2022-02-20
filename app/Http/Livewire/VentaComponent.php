<?php

namespace App\Http\Livewire;

use App\Models\Caja;
use App\Models\Inventario;
use App\Models\Producto;
use App\Models\RelacionCaja;
use App\Models\RelacionPedidoRestaurante;
use App\Models\RelacionVenta;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class VentaComponent extends Component
{
    public $view = "menu";

    public $caja, $productos, $pedido_seleccionado, $buscador, $cajas, $producto, $cantidad_producto, $caja_data;
    public function render()
    {
        $this->caja = Caja::where('local_id', Auth::user()->local_id)->where('status', 1)->count();
        return view('livewire.venta-component');
    }

    public function default()
    {
        $this->view = "menu";
    }

    public function AbrirCaja()
    {
        $caja = new Caja();
        $caja->local_id = Auth::user()->local_id;
        $caja->usuario_id = Auth::user()->id;
        $caja->fecha_apertura = date('Y-m-d');
        $caja->fecha_cierre = date('Y-m-d');
        $caja->status = 1;
        $caja->save();

        $productos = Producto::with('inventarios')->get();

        foreach($productos as $producto)
        {
            $rel = new RelacionCaja();
            $rel->caja_id = $caja->id;
            $rel->producto_id = $producto->id;
            foreach ($producto->inventarios as $inventario)
            {
                if($inventario->local_id == Auth::user()->local_id)
                {
                    $rel->inicio = $inventario->inventario;
                }
            }
            $rel->vendidos = 0;
            $rel->cortesias = 0;
            $rel->fin = 0;
            $rel->save();
        }

        $this->caja = 1;
        $this->caja_data = $caja;
    }

    public function vender()
    {
        $caja = Caja::where('status', 1)->first();
        $this->productos = Producto::all();
        $this->caja_data = Caja::where('local_id', Auth::user()->local_id)->where('status', 1)->first();
        $this->visa = Venta::where('caja_id', $this->caja_data->id)->where('tipo_pago', 2)->sum('total');
        $this->efectivo = Venta::where('caja_id', $this->caja_data->id)->where('tipo_pago', 1)->sum('total');

        $this->view = "vender";
    }

    public function buscar()
    {
        $this->productos = Producto::where('nombre', 'like', "%$this->buscador%")->get();
    }

    public function agregar($id)
    {
        $this->producto = Producto::find($id);

        $this->view = "relacion_venta";
        
    }

    public function pago($id)
    {
        $nombreImpresora = "1256";
        $connector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($connector);
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(2, 2);
        $impresora->feed(5);
        $impresora->text($this->producto->nombre."\n");
        $impresora->text("Ctda: ".$this->cantidad_producto."\n");
        $impresora->feed(5);
        $impresora->close();

        $venta = new Venta();
        $venta->caja_id = $this->caja_data->id;
        $venta->status = 2;
        $venta->total = $this->producto->precio * $this->cantidad_producto;
        $venta->tipo_pago = $id;
        $venta->save();

        $rel = new RelacionVenta();
        $rel->venta_id = $venta->id;
        $rel->producto_id = $this->producto->id;
        $rel->cantidad = $this->cantidad_producto;
        $rel->total = $venta->total;
        $rel->save();

        $inventario = Inventario::where('local_id', Auth::user()->local_id)->where('producto_id', $this->producto->id)->first();
        $inventario->inventario = $inventario->inventario - $this->cantidad_producto;
        $inventario->save();

        $this->cantidad_producto = "";
        $this->vender();
    }

    public function sumarCtda($id){
        $relacion = RelacionVenta::find($id);
        $producto = Producto::find($relacion->producto_id);

        $relacion->cantidad = $relacion->cantidad + 1;
        $relacion->total = $relacion->total + $producto->precio;
        $relacion->save();

        $pedido = $this->pedido_seleccionado;
        $pedido->total = $pedido->total + $producto->precio;
        $pedido->save();

        $this->pedido_seleccionado = $pedido; 
        $this->relacion_pedido = RelacionVenta::where('venta_id',$this->pedido_seleccionado->id)->with('producto')->get();
    }

    public function restarCtda($id)
    {
        $relacion = RelacionVenta::find($id);
        $producto = Producto::find($relacion->producto_id);

        $relacion->cantidad = $relacion->cantidad - 1;
        $relacion->total = $relacion->total - $producto->precio;
        $relacion->save();

        $pedido = $this->pedido_seleccionado;
        $pedido->total = $pedido->total - $producto->precio;
        $pedido->save();

        $this->pedido_seleccionado = $pedido; 
        $this->relacion_pedido = RelacionVenta::where('venta_id',$this->pedido_seleccionado->id)->with('producto')->get();
    }

    public function cerrarCuenta()
    {
        $this->total_pagar = $this->pedido_seleccionado->total;
        $this->procesarCuenta();
    }

    public function procesarCuenta()
    {
        $pedido = $this->pedido_seleccionado;
        $pedido->status = 2;
        $pedido->tipo_pago = 1;
        $pedido->save();

        $relaciones = RelacionVenta::where('venta_id', $pedido->id)->get();

        foreach ($relaciones as $relacion ) {
            $producto = Producto::where('id', $relacion->producto_id)->with('inventarios')->first();

            foreach ($producto->inventarios as $inventario)
            {
                if($inventario->local_id == Auth::user()->local_id)
                {
                    $inventario->inventario = $inventario->inventario - $relacion->cantidad;
                    $inventario->save();
                }
            }
            
        }

        $this->view = "menu";
    }

    public function CerrarCaja()
    {
        $caja = Caja::where('status', 1)->where('usuario_id', Auth::user()->id)->first();
        $productos = Producto::with('inventarios')->get();

        foreach($productos as $producto)
        {
            $rel = RelacionCaja::where('caja_id', $caja->id)->where('producto_id', $producto->id)->first();
            foreach ($producto->inventarios as $inventario)
            {
                if($inventario->local_id == Auth::user()->local_id)
                {
                    $rel->fin = $inventario->inventario;
                    $rel->vendidos = $rel->inicio - $inventario->inventario;
                }
            }
            $rel->save();
        }
        $caja->status = 2;
        $caja->save();
        $this->caja = 0;
    }

    public function reportes()
    {
        $this->cajas = Caja::where('local_id', Auth::user()->local_id)->where('usuario_id', Auth::user()->id)->with('usuario')->get();
        $this->view = "cajas";
    }

    public function verCaja($id)
    {
        $this->caja_data = Caja::where('id', $id)->with(['relacion', 'relacion.producto'])->first();
        $this->visa = Venta::where('caja_id', $this->caja_data->id)->where('tipo_pago', 2)->sum('total');
        $this->efectivo = Venta::where('caja_id', $this->caja_data->id)->where('tipo_pago', 1)->sum('total');
        $this->view = "reporte_detallado";
    }

}
