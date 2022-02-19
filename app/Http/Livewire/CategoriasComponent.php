<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Livewire\Component;

class CategoriasComponent extends Component
{
    public $view = "list";
    public $categoria, $editando, $subcategorias_data = null, $detalle, $subcategoria, $subcategoria_editando;

    public function render()
    {
        return view('livewire.categorias-component', [
            'categorias' => Categoria::all(),
        ]);
    }

    public function default()
    {
        $this->categoria = "";
        $this->view = "list";
    }

    public function crearCategoria()
    {
        $this->view = "crear";
    }

    public function storeCategoria()
    {
        $cat = new Categoria();
        $cat->categoria = $this->categoria;
        $cat->save();

        $this->default();
    }

    public function editarCategoria( $id )
    {
        $cat = Categoria::find($id);
        $this->categoria = $cat->categoria;
        $this->editando = $cat->id;

        $this->view = "editar";
    }

    public function updateCategoria()
    {
        $cat = Categoria::find($this->editando);
        $cat->categoria = $this->categoria;
        $cat->save();

        $this->default();
    }

    public function subcategorias( $id )
    {
        $this->subcategoria = "";
        $this->detalle = $id;
        $this->subcategorias_data = SubCategoria::where('categoria_id', $id)->get();
        $this->view = "subcategorias";
    }

    public function crearSubCategoria()
    {
        $this->view = "crearsub";
    }

    public function storesubCategoria()
    {
        $sub = new SubCategoria();
        $sub->categoria_id = $this->detalle;
        $sub->sub_categoria = $this->subcategoria;
        $sub->save();

        $this->subcategorias($this->detalle);
    }

    public function editarSubcategoria( $id )
    {
        $sub = SubCategoria::find($id);
        $this->subcategoria_editando = $id;
        $this->subcategoria = $sub->sub_categoria;
        $this->view = "editarsub";  
    }

    public function updateSubCategoria()
    {
        $sub = SubCategoria::find($this->subcategoria_editando);
        $sub->sub_categoria = $this->subcategoria;
        $sub->save();

        $this->subcategorias($this->detalle);
    }

    public function defaultSubCategoria()
    {
        $this->subcategorias($this->detalle);
    }
}
