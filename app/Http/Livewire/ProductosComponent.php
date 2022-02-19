<?php

namespace App\Http\Livewire;

use App\Models\Inventario;
use App\Models\Locale;
use App\Models\Producto;
use Livewire\Component;

class ProductosComponent extends Component
{

    public $view = "list";
    public $producto, $precio, $codigo_barra, $codigo_interno, $inventarios, $producto_edit, $local, $inventario, $inv_edit, $producto_inv, $producto_editando;


    public function render()
    {
        return view('livewire.productos-component', [
            'productos' => Producto::all()
        ]);
    }

    public function crearProducto()
    {
        $this->view = "crear";
    }

    public function default()
    {
        $this->view = "list";
    }

    public function storeProducto()
    {
        $producto = new Producto();
        $producto->nombre = $this->producto;
        $producto->precio = $this->precio;
        $producto->codigo_barra = $this->codigo_barra;
        $producto->codigo_interno = $this->codigo_interno;
        $producto->save();

        $locales = Locale::all();

        foreach ($locales as $loca) {
            $inv = new Inventario();
            $inv->local_id = $loca->id;
            $inv->producto_id = $producto->id;
            $inv->inventario = 0;
            $inv->save();
        }

        $this->view = "list";
    }   

    public function verInventario( $id )
    {
        $this->producto_inv = $id;
        $this->inventarios = Inventario::where('producto_id', $id)->with('local')->get();
        $this->view = "inventarios";
    }

    public function editarInventario( $id )
    {
        $inventario = Inventario::where('id', $id)->with(['local', 'producto'])->first();
        $this->local = $inventario->local->local;
        $this->producto_edit = $inventario->producto->nombre;
        $this->inventario = $inventario->inventario;
        $this->inv_edit = $id;

        $this->view = "editarInventario";
    }

    public function updateInventario()
    {
            $inv = Inventario::find($this->inv_edit);
            $inv->inventario = $this->inventario;
            $inv->save();

            $this->verInventario($this->producto_inv);
    }

    public function RegresarInventario()
    {
        $this->verInventario($this->producto_inv);
    }

    public function editarProducto( $id )
    {
        $this->producto_editando = $id;
        $producto = Producto::find($id);
        $this->nombre = $producto->nombre;
        $this->precio = $producto->precio;
        $this->codigo_barra = $producto->codigo_barra;
        $this->codigo_interno = $producto->codigo_interno;
        
        $this->view = "editar";
    }

    public function updateProducto()
    {
        $producto = Producto::find($this->producto_editando);
        $producto->nombre = $this->nombre;
        $producto->precio = $this->precio;
        $producto->codigo_barra = $this->codigo_barra;
        $producto->codigo_interno = $this->codigo_interno;
        $producto->save();

        $this->view = "list";
    }
}
