<?php

namespace App\Http\Livewire;

use App\Models\Caja;
use App\Models\Categoria;
use App\Models\MesasRestaurante;
use App\Models\MozoRestaurante;
use App\Models\PedidoRestaurante;
use App\Models\Producto;
use App\Models\RelacionCaja;
use App\Models\RelacionPedidoRestaurante;
use App\Models\SubCategoria;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RestauranteComponent extends Component
{
    public $view = "menu";

    public $mesas, $mesa, $mesa_id, $mozo, $caja, $caja_data, $visa, $efectivo, $mesas_data, $pedido_seleccionado, $categorias, $productos, $buscador;
    public $relacion_pedido, $tipo_pago, $pedidos;


    public function render()
    {
        $this->caja = Caja::where('local_id', Auth::user()->local_id)->where('status', 1)->count();
        return view('livewire.restaurante-component', [
            'caja' => $this->caja
        ]);
    }

    public function default()
    {
        $this->view = "menu";
    }

    public function vender()
    {
        $this->caja_data = Caja::where('local_id', Auth::user()->local_id)->where('status', 1)->first();
        $this->visa = PedidoRestaurante::where('caja_id', $this->caja_data->id)->where('tipo_pago', 2)->sum('total');
        $this->efectivo = PedidoRestaurante::where('caja_id', $this->caja_data->id)->where('tipo_pago', 1)->sum('total');

        $this->mesas_data = MesasRestaurante::with('pedido')->get();
        $this->view = "salon_restaurante";
    }

    public function GestionMesas()
    {
        $this->mesa = "";
        $this->mesas = MesasRestaurante::where('local_id', Auth::user()->local_id)->get();
        $this->view = "mesas.list";
    }

    public function crearMesa()
    {
        $this->view = "mesas.crear";
    }

    public function storeMesa()
    {
        $mesa = new MesasRestaurante();
        $mesa->numero_mesa = $this->mesa;
        $mesa->local_id = Auth::user()->local_id;
        $mesa->save();

        $this->GestionMesas();
    }

    public function editarMesa( $id )
    {
        $mesa = MesasRestaurante::find($id);
        $this->mesa = $mesa->numero_mesa;
        $this->mesa_id = $mesa->id;
        $this->view = "mesas.editar";
    }

    public function updateMesa()
    {
        $mesa = MesasRestaurante::find($this->mesa_id);
        $mesa->numero_mesa = $this->mesa;
        $mesa->save();

        $this->GestionMesas();
    }

    public function GestionMozos()
    {
        $this->mozo = "";
        $this->mozos = MozoRestaurante::where('local_id', Auth::user()->local_id)->get();
        $this->view = "mozos.list";
    }
    
    public function crearMozo()
    {
        $this->view = "mozos.crear";
    }

    public function storeMozo()
    {
        $mozo = new MozoRestaurante();
        $mozo->nombre = $this->mozo;
        $mozo->local_id = Auth::user()->local_id;;
        $mozo->save();

        $this->GestionMozos();
    }

    public function updateMozo()
    {
        $mozo = new MozoRestaurante();
        $mozo->nombre = $this->mozo;
        $mozo->local_id = Auth::user()->local_id;;
        $mozo->save();

        $this->GestionMozos();
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

    public function nuevoPedido( $id )
    {
        $this->numero_mesa = $id;
        $this->mozos = MozoRestaurante::where('local_id', Auth::user()->local_id)->get();
        $this->view = "pedidos.crear";
    }

    public function storePedido()
    {
        $new = new PedidoRestaurante();
        $new->mesa_id = $this->numero_mesa;
        $new->mozo_id = $this->mozo;
        $new->caja_id = $this->caja_data->id;
        $new->status = 1;
        $new->total = 0;
        $new->tipo_pago = 0;
        $new->save();
        $this->productos = Producto::all();
        $this->relacion_pedido = RelacionPedidoRestaurante::where('pedido_id', $new->id)->with('producto')->get();
        $this->pedido_seleccionado = $new; 
        $this->view = "pedidos.editar_detalle";
    }

    public function editarPedido($id)
    {
        $new = PedidoRestaurante::where('id', $id)->with(['mozo', 'mesa'])->first();
        $this->relacion_pedido = RelacionPedidoRestaurante::where('pedido_id', $new->id)->with('producto')->get();
        $this->productos = Producto::all();
        $this->pedido_seleccionado = $new; 
        $this->view = "pedidos.editar_detalle";
    }

    public function ventaseleccionada(){
        $this->editarPedido($this->pedido_seleccionado->id);
    }

    public function buscar()
    {
        $this->productos = Producto::where('nombre', 'like', "%$this->buscador%")->get();
    }

    public function agregar($id)
    {
        $producto = Producto::find($id);
        $rel = new RelacionPedidoRestaurante();
        $rel->pedido_id = $this->pedido_seleccionado->id;
        $rel->producto_id = $id;
        $rel->cantidad = 1;
        $rel->total = $producto->precio;
        $rel->save();

        $pedido = $this->pedido_seleccionado;
        $pedido->total = $pedido->total + $rel->total;
        $pedido->save();

        $this->pedido_seleccionado = $pedido; 

        $this->relacion_pedido = RelacionPedidoRestaurante::where('pedido_id',$this->pedido_seleccionado->id)->with('producto')->get();
    }

    public function sumarCtda($id){
        $relacion = RelacionPedidoRestaurante::find($id);
        $producto = Producto::find($relacion->producto_id);

        $relacion->cantidad = $relacion->cantidad + 1;
        $relacion->total = $relacion->total + $producto->precio;
        $relacion->save();

        $pedido = $this->pedido_seleccionado;
        $pedido->total = $pedido->total + $producto->precio;
        $pedido->save();

        $this->pedido_seleccionado = $pedido; 
        $this->relacion_pedido = RelacionPedidoRestaurante::where('pedido_id',$this->pedido_seleccionado->id)->with('producto')->get();
    }

    public function restarCtda($id)
    {
        $relacion = RelacionPedidoRestaurante::find($id);
        $producto = Producto::find($relacion->producto_id);

        $relacion->cantidad = $relacion->cantidad - 1;
        $relacion->total = $relacion->total - $producto->precio;
        $relacion->save();

        $pedido = $this->pedido_seleccionado;
        $pedido->total = $pedido->total - $producto->precio;
        $pedido->save();

        $this->pedido_seleccionado = $pedido; 
        $this->relacion_pedido = RelacionPedidoRestaurante::where('pedido_id',$this->pedido_seleccionado->id)->with('producto')->get();
    }

    public function eliminarRel($id)
    {
        $rel = RelacionPedidoRestaurante::find($id);

        $pedido = $this->pedido_seleccionado;
        $pedido->total = $pedido->total - $rel->total;
        $pedido->save();

        $rel->delete();

        $this->pedido_seleccionado = $pedido; 
        $this->relacion_pedido = RelacionPedidoRestaurante::where('pedido_id',$this->pedido_seleccionado->id)->with('producto')->get();
    }

    public function cerrarCuenta()
    {
        $this->total_pagar = $this->pedido_seleccionado->total;
        $this->view = "pedidos.cerrar";
    }

    public function procesarCuenta()
    {
        $pedido = $this->pedido_seleccionado;
        $pedido->status = 2;
        $pedido->tipo_pago = $this->tipo_pago;
        $pedido->save();

        $relaciones = RelacionPedidoRestaurante::where('pedido_id', $pedido->id)->get();

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

        $this->vender();
    }

    public function VentasDia()
    {
        $this->caja_data = Caja::where('local_id', Auth::user()->local_id)->where('status', 1)->first();
        $this->pedidos = PedidoRestaurante::where('caja_id', $this->caja_data->id)->get();
        $this->view = "ventas_dia";
    }

    public function cargarPedido($id)
    {
        $this->pedido_seleccionado = PedidoRestaurante::where('id', $id)->with(['mozo', 'mesa', 'relacion', 'relacion.producto'])->first();;
    }
}
