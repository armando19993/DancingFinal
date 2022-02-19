<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Locale as ModelsLocale;
use App\Models\User;

class LocalesComponent extends Component
{
    public $view = "list";
    public $administradores, $local, $administrador_id, $editando;
    public function render()
    {
        return view('livewire.locales-component', [
            'locales' => ModelsLocale::with('administrador')->get(),
        ]);
    }

    public function default()
    {
        $this->view = "list";
    }

    public function crearLocal()
    {
        $this->administradores = User::where('tipo_usuario', 2)->get();
        
        $this->view ="crear";
    }

    public function storeLocal()
    {
        $local =  new ModelsLocale();
        $local->local = $this->local;
        $local->administrador_id = $this->administrador_id;
        $local->save();

        $this->view = "list";
    }

    public function editarLocal( $id )
    {
        $this->editando = $id;
        $this->administradores = User::where('tipo_usuario', 2)->get();
        $local = ModelsLocale::find($id);
        $this->local = $local->local;
        $this->administrador_id = $local->administrador_id;

        $this->view = "editar";
    }

    public function updateLocal()
    {
        $local =  ModelsLocale::find($this->editando);
        $local->local = $this->local;
        $local->administrador_id = $this->administrador_id;
        $local->save();

        $this->view = "list";
    }
}
